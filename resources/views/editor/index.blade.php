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
                                                    <!-- Edit Button -->
                                                    <button class="btn btn-outline-success mx-1" type="button" data-bs-toggle="modal" data-bs-target="#editModal-{{$movie->id}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                        </svg>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal-{{$movie->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle-{{$movie->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalTitle">Update Movie</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('editor.movie.update', $movie->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="genre" class="form-label">Genre</label>
                                                        <input type="text" class="form-control" id="genre" name="genre" value="{{ $movie->genre }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="rate_per_day" class="form-label">Rate</label>
                                                        <input type="number" class="form-control" id="rate_per_day" name="rate_per_day" value="{{ $movie->rate_per_day }}" min="0" step="0.01" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="imageUrl" class="form-label">Image Url</label>
                                                        <input type="text" class="form-control" id="imageUrl" name="imageUrl" value="{{ $movie->imageUrl }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update Movie</button>
                                                </div>
                                            </form>
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
