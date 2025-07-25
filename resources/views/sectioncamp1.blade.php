<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Semua Campaign' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="mb-20 bg-gray-50">
    @include('components.navbar')

    <main class="max-w-7xl mx-auto py-10 px-4">
        <div class="mb-4 pr-8 flex items-center justify-between">
            <h1 class="text-[32px] font-[700] text-black"
                style="font-family: 'Poppins', sans-serif !important;">
                {{ strtoupper($title) ?? 'SEMUA CAMPAIGN' }}
            </h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-7">
            @forelse($campaigns as $campaign)
                @if(!is_null($campaign->nama))
                    @include('components.campaign-item', ['campaign' => $campaign])
                @endif
            @empty
                <div class="col-span-3 text-center py-16 bg-white border rounded-lg">
                    <p class="text-gray-500">{{ $emptyMessage ?? 'Tidak ada campaign untuk ditampilkan' }}</p>
                </div>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $campaigns->links() }}
        </div>
    </main>
</body>

</html>
