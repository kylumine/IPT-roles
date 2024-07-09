<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="m-1 fw-bold display-6">MOVIE LIST</h1>
                        <div>
                            <!-- Button trigger modal -->
                            @can('create movie')
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                Add Movie
                            </button>
                            @endcan

                            @can('export movie')
                            <form action="{{ route('movie.excel') }}" method="POST" target="_blank" class="d-inline">
                                @csrf
                                <button class='btn btn-success' type='submit'>
                                    Export Excel
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>


                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header flex justify-between">
                           <h5 class="modal-title" id="exampleModalLongTitle">Create Movie</h5>
                           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                           </div>

                           <form action="{{ route('movie.store') }}" method="POST">
                              @csrf
                              <div class="modal-body">
                                 <div class="mb-3">
                                       <label for="title" class="form-label">Title</label>
                                       <input type="text" class="form-control" id="title" name="title" required>
                                 </div>
                                 <div class="mb-3">
                                       <label for="genre" class="form-label">Genre</label>
                                       <input type="text" class="form-control" id="genre" name="genre" rows="3" required></input>
                                 </div>
                                 <div class="mb-3">
                                       <label for="rate_per_day" class="form-label">Rate</label>
                                       <input type="number" class="form-control" id="rate_per_day" name="rate_per_day" min="0" step="0.01" required>
                                 </div>
                                 <div class="mb-3">
                                    <label for="imageUrl" class="form-label">Image URL</label>
                                    <input type="text" class="form-control" id="imageUrl" name="imageUrl" rows="3" required></input>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Create Movie</button>
                              </div>
                           </form>

                        </div>
                     </div>
                  </div>
               </div>

               <!-- Table -->

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
                                            @can('edit movie')
                                            <button class="btn btn-outline-success mx-1" type="button" data-bs-toggle="modal" data-bs-target="#editModal-{{$movie->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                  </svg>
                                            </button>
                                            @endcan
                                            <!-- Delete Button -->
                                            @can('delete movie')
                                            <button class="btn btn-outline-danger mx-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$movie->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                  </svg>
                                            </button>
                                            @endcan
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
                                    <form action="{{ route('movie.update', $movie->id) }}" method="POST">
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

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal-{{$movie->id}}" tabindex="-1" aria-labelledby="deleteModalLabel-{{$movie->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Movie</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            Are you sure you want to delete this movie?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete movie</button>
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
</x-app-layout>
