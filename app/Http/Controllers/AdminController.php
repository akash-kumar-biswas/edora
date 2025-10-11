<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\PaymentItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get counts
        $totalInstructors = Instructor::count();
        $activeInstructors = Instructor::where('status', 1)->count();

        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 1)->count();

        $totalCourses = Course::count();
        $activeCourses = Course::where('status', 2)->count();
        $pendingCourses = Course::where('status', 0)->count();

        $totalEnrollments = Enrollment::count();

        // Get payment statistics - Calculate from payment_items table
        $totalRevenue = PaymentItem::sum('price');

        // Get this month's revenue from payment_items joined with payments
        $thisMonthRevenue = PaymentItem::whereHas('payment', function ($query) {
            $query->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', date('m'));
        })->sum('price');

        // Calculate last month's revenue for growth comparison
        $lastMonthRevenue = PaymentItem::whereHas('payment', function ($query) {
            $query->whereYear('created_at', date('Y', strtotime('-1 month')))
                ->whereMonth('created_at', date('m', strtotime('-1 month')));
        })->sum('price');

        // Calculate growth percentage
        if ($lastMonthRevenue > 0) {
            $growthPercentage = (($thisMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
        } else {
            // If no revenue last month, show 100% growth if there's revenue this month
            $growthPercentage = $thisMonthRevenue > 0 ? 100 : 0;
        }

        // Determine growth direction
        $growthDirection = $thisMonthRevenue >= $lastMonthRevenue ? 'up' : 'down';

        // Get recent enrollments (last 5)
        $recentEnrollments = Enrollment::with(['student', 'course'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get popular courses (by enrollment count)
        $popularCourses = Course::withCount('students')
            ->orderBy('students_count', 'desc')
            ->limit(5)
            ->get();

        // Hybrid enrollment chart: Daily for current month, Monthly for previous months
        $startOfCurrentMonth = now()->startOfMonth();
        $startOfPeriod = now()->subMonths(6)->startOfMonth(); // Last 6 months

        $monthLabels = [];
        $monthCounts = [];

        // Get monthly data for previous months (6 months ago to last month)
        $previousMonthsData = Enrollment::select(
            DB::raw('DATE_FORMAT(created_at, "%b %Y") as month'),
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month_key'),
            DB::raw('COUNT(*) as count')
        )
            ->whereBetween('created_at', [$startOfPeriod, $startOfCurrentMonth->copy()->subSecond()])
            ->groupBy('month', 'month_key')
            ->orderBy('month_key')
            ->get();

        // Add previous months to labels and counts
        foreach ($previousMonthsData as $data) {
            $monthLabels[] = $data->month;
            $monthCounts[] = $data->count;
        }

        // Get daily data for current month
        $currentMonthData = Enrollment::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', $startOfCurrentMonth)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Create daily labels and counts for current month
        $daysInMonth = now()->daysInMonth;
        $currentMonthCounts = array_fill(0, $daysInMonth, 0);

        foreach ($currentMonthData as $enrollment) {
            $dayOfMonth = (int) date('d', strtotime($enrollment->date));
            $currentMonthCounts[$dayOfMonth - 1] = $enrollment->count;
        }

        // Add current month daily data to the chart
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = now()->startOfMonth()->copy()->addDays($day - 1);
            $monthLabels[] = $date->format('M d');
            $monthCounts[] = $currentMonthCounts[$day - 1];
        }

        return view('admin.dashboard', [
            'admin_name' => session('admin_name'),
            'totalInstructors' => $totalInstructors,
            'activeInstructors' => $activeInstructors,
            'totalStudents' => $totalStudents,
            'activeStudents' => $activeStudents,
            'totalCourses' => $totalCourses,
            'activeCourses' => $activeCourses,
            'pendingCourses' => $pendingCourses,
            'totalEnrollments' => $totalEnrollments,
            'totalRevenue' => $totalRevenue,
            'thisMonthRevenue' => $thisMonthRevenue,
            'lastMonthRevenue' => $lastMonthRevenue,
            'growthPercentage' => $growthPercentage,
            'growthDirection' => $growthDirection,
            'recentEnrollments' => $recentEnrollments,
            'popularCourses' => $popularCourses,
            'monthLabels' => $monthLabels,
            'monthCounts' => $monthCounts,
        ]);
    }

    public function instructors(Request $request)
    {
        // Get sorting parameters
        $sort_by = $request->get('sort_by', 'id');
        $sort_order = $request->get('sort_order', 'asc');

        // Validate column to avoid injection
        $allowed = ['id', 'name', 'email', 'status', 'created_at'];
        if (!in_array($sort_by, $allowed)) {
            $sort_by = 'id';
        }

        $instructors = Instructor::orderBy($sort_by, $sort_order)->get();

        return view('admin.instructors', [
            'admin_name' => session('admin_name'),
            'instructors' => $instructors,
            'sort_by' => $sort_by,
            'sort_order' => $sort_order
        ]);
    }

    public function students(Request $request)
    {
        // Get sorting parameters
        $sort_by = $request->get('sort_by', 'id');
        $sort_order = $request->get('sort_order', 'asc');

        // Validate column to avoid injection
        $allowed = ['id', 'name', 'email', 'status', 'created_at'];
        if (!in_array($sort_by, $allowed)) {
            $sort_by = 'id';
        }

        $students = Student::orderBy($sort_by, $sort_order)->get();

        return view('admin.students', [
            'admin_name' => session('admin_name'),
            'students' => $students,
            'sort_by' => $sort_by,
            'sort_order' => $sort_order
        ]);
    }

    public function courses()
    {
        return view('admin.courses', ['admin_name' => session('admin_name')]);
    }

    public function enrollments()
    {
        return view('admin.enrollments', ['admin_name' => session('admin_name')]);
    }


    public function exportReport()
    {
        // Generate CSV report
        $filename = 'dashboard_report_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');

            // Add header row
            fputcsv($file, ['Dashboard Report - Generated on ' . date('F d, Y H:i:s')]);
            fputcsv($file, []); // Empty row

            // Summary Statistics
            fputcsv($file, ['SUMMARY STATISTICS']);
            fputcsv($file, ['Metric', 'Total', 'Active', 'Inactive/Other']);

            $totalStudents = Student::count();
            $activeStudents = Student::where('status', 1)->count();
            fputcsv($file, ['Students', $totalStudents, $activeStudents, $totalStudents - $activeStudents]);

            $totalInstructors = Instructor::count();
            $activeInstructors = Instructor::where('status', 1)->count();
            fputcsv($file, ['Instructors', $totalInstructors, $activeInstructors, $totalInstructors - $activeInstructors]);

            $totalCourses = Course::count();
            $activeCourses = Course::where('status', 2)->count();
            $pendingCourses = Course::where('status', 0)->count();
            fputcsv($file, ['Courses', $totalCourses, $activeCourses, $pendingCourses]);

            $totalEnrollments = Enrollment::count();
            fputcsv($file, ['Enrollments', $totalEnrollments, '-', '-']);

            fputcsv($file, []); // Empty row

            // Revenue Statistics
            fputcsv($file, ['REVENUE STATISTICS']);
            $totalRevenue = Payment::sum('amount');
            $thisMonthRevenue = Payment::whereYear('created_at', date('Y'))
                ->whereMonth('created_at', date('m'))
                ->sum('amount');
            fputcsv($file, ['Total Revenue', '$' . number_format($totalRevenue, 2)]);
            fputcsv($file, ['This Month Revenue', '$' . number_format($thisMonthRevenue, 2)]);

            fputcsv($file, []); // Empty row

            // Top 5 Popular Courses
            fputcsv($file, ['TOP 5 POPULAR COURSES']);
            fputcsv($file, ['Rank', 'Course Title', 'Instructor', 'Total Students', 'Price']);

            $popularCourses = Course::withCount('students')
                ->with('instructor')
                ->orderBy('students_count', 'desc')
                ->limit(5)
                ->get();

            foreach ($popularCourses as $index => $course) {
                fputcsv($file, [
                    '#' . ($index + 1),
                    $course->title,
                    $course->instructor->name ?? 'N/A',
                    $course->students_count,
                    '$' . number_format($course->price, 2)
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

