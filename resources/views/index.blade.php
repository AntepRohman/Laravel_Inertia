<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container py-5">
        <div class="d-flex align-items-center justify-context-between mb-5">
            <h1>Artikel</h1>
            <button class="btn btn-primary" data-bs-toogle="modal" data-bs-target="#addItem">
                Tambah Baru
            </button>
        </div>
        <div class="row">
            @foreach ($articles as $item)
            <div class="col-md-4">
                <div class="card border-0 mb-3">
                     <img src="{{ url('storage/' . $item->image) }}" alt="" class="card-img-top">

                     <div class="card-body">
                        <h5 class="card-title">{{ $item->titile}}</h5>
                        <p class="mb-0 text-secondary">{{ $item->description }}</p>
                     </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>

    <div class="modal" id="addItem" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Artikel Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title">Judul Artikel</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="image">Judul Artikel</label>
                        <input type="file" accept="image/*" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="18" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan Baru</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>