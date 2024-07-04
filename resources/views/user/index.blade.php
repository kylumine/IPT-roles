<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="m-1 fw-bold display-6">MOVIE LIST</h1>
                    </div>
                    <div class="container py-4">
                        <div class="row">
                            @foreach ($movies as $movie)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ $movie->imageUrl }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">{{ $movie->title }}</h5>
                                                <p class="card-text"><strong>Genre:</strong> {{ $movie->genre }}</p>
                                                <p class="card-text"><strong>Rate:</strong> ${{ $movie->rate_per_day }}</p>
                                                <div class="d-flex justify-content-end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
