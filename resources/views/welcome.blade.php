<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio API Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            margin: 0;
            min-height: 100vh;
        }
        .api-panel {
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: min(360px, calc(100vw - 30px));
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            padding: 16px;
            z-index: 9999;
        }
        .api-panel h4 {
            margin: 0 0 10px;
            font-size: 1rem;
        }
        .meta {
            font-size: 12px;
            opacity: 0.9;
            margin-bottom: 12px;
        }
        .links {
            display: grid;
            gap: 8px;
        }
        .links a {
            color: #7dd3fc;
            text-decoration: none;
            font-size: 13px;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="api-panel">
        <h4>Perdi - NPM 24312212</h4>
        <div class="meta">Laravel {{ app()->version() }}</div>
        <div class="links">
            @foreach(['profile','skills','projects','experiences','certificates'] as $endpoint)
                <a href="/api/portfolio/{{ $endpoint }}" target="_blank">GET /api/portfolio/{{ $endpoint }}</a>
            @endforeach
        </div>
    </div>
</body>
</html>
