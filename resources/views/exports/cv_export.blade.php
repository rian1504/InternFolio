<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Helvetica', sans-serif; font-size: 13px; line-height: 1.4; color: #333; padding: 40px; }
        
        .header { text-align: center; border-bottom: 2px solid #1e3a8a; padding-bottom: 10px; margin-bottom: 20px; }
        .name { font-size: 26px; font-weight: bold; color: #1e3a8a; }
        .contact { font-size: 12px; color: #666; margin-top: 5px; }

        .section-title { font-size: 15px; font-weight: bold; color: #1e3a8a; border-bottom: 2px solid #1e3a8a; padding-bottom: 5px; margin: 15px 0 8px 0; text-transform: uppercase; padding-left: 15px; }
        .section-content { padding-left: 0; }
        
        .item-header { font-weight: bold; }
        .project-title { font-weight: bold; font-size: 14px; }
        .project-content { margin-left: 15px; margin-top: 5px; }
        .item-row { width: 100%; }
        .item-row td:last-child { text-align: right; }
        .item-sub { color: #555; margin-bottom: 5px; }
        
        ul { margin-left: 20px; margin-bottom: 10px; }
        li { margin-bottom: 2px; }

        .skills-section { width: 100%; margin-top: 10px; }
        .skills-label { font-weight: bold; color: #1e3a8a; }
    </style>
</head>
<body>
    <div class="header">
        <div class="name">{{ strtoupper($user->user_name) }}</div>
        <div style="font-weight: bold; color: #3b82f6; margin-top: 3px;">{{ strtoupper($user->position) }}</div>
    </div>

    <div class="contact" style="text-align: center; padding: 8px 0; margin-bottom: 10px; border-bottom: 1px solid #ddd;">
        <a href="mailto:{{ $user->email }}" style="color: #1e3a8a; text-decoration: none;">{{ $user->email }}</a>
        @if($user->linkedin_url) | <a href="{{ $user->linkedin_url }}" target="_blank" style="color: #1e3a8a; text-decoration: none;">{{ str_replace(['https://', 'http://'], '', $user->linkedin_url) }}</a> @endif 
        @if($user->github_url) | <a href="{{ $user->github_url }}" target="_blank" style="color: #1e3a8a; text-decoration: none;">{{ str_replace(['https://', 'http://'], '', $user->github_url) }}</a> @endif 
        @if($user->instagram_url) | <a href="{{ $user->instagram_url }}" target="_blank" style="color: #1e3a8a; text-decoration: none;">{{ str_replace(['https://', 'http://'], '', $user->instagram_url) }}</a> @endif 
    </div>

    <div class="section-title">Pendidikan</div>
    <div class="item-header">
        <span>{{ $user->school }}</span>
    </div>
    <div class="item-sub">{{ $user->major }}</div>

    <div class="section-title">Pengalaman Magang</div>
    <div class="section-content">
        <table class="item-row">
            <tr>
                <td class="item-header">PT XYZ</td>
                <td>{{ \Carbon\Carbon::parse($user->join_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($user->end_date)->format('d M Y') }}</td>
            </tr>
        </table>
        <div class="item-sub">Departemen: {{ $user->department->department_name }}</div>
    </div>

    <div class="section-title">Pengalaman Proyek</div>
    @foreach ($user->projects as $project)
    <div style="margin-bottom: 10px;">
        <table class="item-row">
            <tr>
                <td class="project-title">{{ $project->project_title }} ({{ $project->category->category_name ?? 'Uncategorized' }})</td>
                <td>{{ $project->project_duration }} Bulan</td>
            </tr>
        </table>
        <div class="project-content">
            <p style="margin-bottom: 5px;">{{ $project->project_description }}</p>
            <p>Teknologi:
            @php
                $technologies = explode(',', $project->project_technology);
            @endphp
            {{ implode(', ', array_map('trim', $technologies)) }}</p>
        </div>
    </div>
    @endforeach

    <div class="section-title">Keahlian (Hard Skills)</div>
    <div class="skills-section">
        <p>{{ $auto_skills }}</p> 
    </div>

    <div style="position: fixed; bottom: 20px; width: 100%; text-align: center; font-size: 9px; color: #999;">
        Dibuat otomatis via InternFolio pada {{ $generated_at }}
    </div>
</body>
</html>