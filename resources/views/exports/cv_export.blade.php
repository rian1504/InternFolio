<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $user->user_name }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            line-height: 1.5;
            color: #333;
            background-color: #fff;
        }

        .container {
            max-width: 100%;
            padding: 30px;
        }

        /* Header Section */
        .header {
            width: 100%;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #3b82f6;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-left {
            width: 80px;
            vertical-align: top;
        }

        .header-right {
            vertical-align: top;
            padding-left: 20px;
        }

        .profile-image {
            width: 70px;
            height: 70px;
            border-radius: 35px;
            border: 3px solid #3b82f6;
        }

        .profile-placeholder {
            width: 70px;
            height: 70px;
            background-color: #3b82f6;
            color: #fff;
            font-size: 28px;
            font-weight: bold;
        }

        .profile-placeholder-inner {
            display: block;
            width: 70px;
            height: 70px;
            text-align: center;
            line-height: 70px;
        }

        .name {
            font-size: 22px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 3px;
        }

        .position {
            font-size: 14px;
            color: #3b82f6;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .contact-info {
            font-size: 10px;
            color: #6b7280;
        }

        /* Section Styling */
        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e5e7eb;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Two Column Layout using table */
        .two-column-table {
            width: 100%;
            border-collapse: collapse;
        }

        .column-left {
            width: 50%;
            padding-right: 15px;
            vertical-align: top;
        }

        .column-right {
            width: 50%;
            padding-left: 15px;
            vertical-align: top;
        }

        /* Info Box */
        .info-box {
            background-color: #f8fafc;
            padding: 12px;
            margin-bottom: 10px;
            border-left: 3px solid #3b82f6;
        }

        .info-label {
            font-size: 9px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 11px;
            font-weight: 600;
            color: #1f2937;
        }

        /* Project Card */
        .project-card {
            background-color: #fafafa;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #e5e7eb;
        }

        .project-title {
            font-size: 12px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .project-description {
            font-size: 10px;
            color: #4b5563;
            margin-bottom: 5px;
        }

        .project-tech {
            font-size: 9px;
            color: #3b82f6;
            font-style: italic;
        }

        /* Rating Section */
        .rating-box {
            background-color: #fef3c7;
            padding: 15px;
            border: 1px solid #fbbf24;
        }

        .rating-stars {
            color: #f59e0b;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .rating-text {
            font-size: 10px;
            color: #92400e;
            font-style: italic;
        }

        /* Social Links */
        .social-links {
            margin-top: 10px;
        }

        .social-link {
            font-size: 10px;
            color: #3b82f6;
            margin-bottom: 5px;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 9px;
            color: #9ca3af;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 15px;
            color: #9ca3af;
            font-style: italic;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <table class="header-table">
                <tr>
                    <td class="header-left">
                        @if ($user->user_image && file_exists(public_path('storage/' . $user->user_image)))
                            <img src="{{ public_path('storage/' . $user->user_image) }}" class="profile-image"
                                alt="{{ $user->user_name }}">
                        @else
                            <div class="profile-placeholder">
                                <span
                                    class="profile-placeholder-inner">{{ strtoupper(substr($user->user_name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </td>
                    <td class="header-right">
                        <div class="name">{{ $user->user_name }}</div>
                        <div class="position">{{ $user->position ?? 'Anak Magang' }}</div>
                        <div class="contact-info">
                            {{ $user->email }}
                            @if ($user->user_badge)
                                | Badge: {{ $user->user_badge }}
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Two Column Layout -->
        <table class="two-column-table">
            <tr>
                <!-- Left Column -->
                <td class="column-left">
                    <!-- Education Section -->
                    <div class="section">
                        <div class="section-title">Pendidikan</div>
                        <div class="info-box">
                            <div class="info-label">Institusi</div>
                            <div class="info-value">{{ $user->school ?? '-' }}</div>
                        </div>
                        <div class="info-box">
                            <div class="info-label">Program Studi</div>
                            <div class="info-value">{{ $user->major ?? '-' }}</div>
                        </div>
                    </div>

                    <!-- Internship Info -->
                    <div class="section">
                        <div class="section-title">Pengalaman Magang</div>
                        <div class="info-box">
                            <div class="info-label">Departemen</div>
                            <div class="info-value">{{ $user->department->department_name ?? '-' }}</div>
                        </div>
                        <div class="info-box">
                            <div class="info-label">Periode</div>
                            <div class="info-value">
                                {{ \Carbon\Carbon::parse($user->join_date)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($user->end_date)->format('d M Y') }}
                            </div>
                        </div>
                        <div class="info-box">
                            <div class="info-label">Durasi</div>
                            <div class="info-value">
                                {{ $duration['months'] }}
                                Bulan{{ $duration['days'] > 0 ? ' ' . $duration['days'] . ' Hari' : '' }}
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    @if ($user->linkedin_url || $user->github_url || $user->instagram_url)
                        <div class="section">
                            <div class="section-title">Sosial Media</div>
                            <div class="social-links">
                                @if ($user->linkedin_url)
                                    <div class="social-link">LinkedIn: {{ $user->linkedin_url }}</div>
                                @endif
                                @if ($user->github_url)
                                    <div class="social-link">GitHub: {{ $user->github_url }}</div>
                                @endif
                                @if ($user->instagram_url)
                                    <div class="social-link">Instagram: {{ $user->instagram_url }}</div>
                                @endif
                            </div>
                        </div>
                    @endif
                </td>

                <!-- Right Column -->
                <td class="column-right">
                    <!-- Projects Section -->
                    <div class="section">
                        <div class="section-title">Proyek ({{ $user->projects->count() }})</div>
                        @if ($user->projects->count() > 0)
                            @foreach ($user->projects as $project)
                                <div class="project-card">
                                    <div class="project-title">{{ $project->project_title }}</div>
                                    <div class="project-description">
                                        {{ Str::limit($project->project_description, 150) }}
                                    </div>
                                    <div class="project-tech">
                                        Teknologi: {{ $project->project_technology }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="empty-state">
                                Belum ada proyek yang ditambahkan
                            </div>
                        @endif
                    </div>
                </td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="footer">
            Dokumen ini di-generate oleh InternFolio pada {{ $generated_at }}
        </div>
    </div>
</body>

</html>
