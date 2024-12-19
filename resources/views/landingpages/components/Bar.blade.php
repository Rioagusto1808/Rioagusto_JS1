<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar Component</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .container-wrapper {
  display: flex;
  justify-content: space-between; /* Mengatur elemen agar berjauhan */
  align-items: flex-start; /* Agar sidebar dan konten utama sejajar di atas */
  padding: 20px;
}


.right-container {
  width: 350px; /* Lebar sidebar */
  margin-left: 20px; /* Jarak antara konten utama dan sidebar */
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}


    .search-bar {
      display: flex;
      align-items: center;
      padding: 10px;
      background-color: #ffffff;
      border-bottom: 1px solid #ddd;
    }

    .search-bar input {
      border: none;
      outline: none;
      padding: 10px;
      flex-grow: 1;
      font-size: 0.9rem;
      color: #495057;
    }

    .search-bar button {
      border: none;
      background-color: transparent;
      color: #495057;
      cursor: pointer;
      padding: 5px 10px;
      font-size: 1.2rem;
    }

    .search-bar button:hover {
      color: #007bff;
    }

    .news-content {
      padding: 10px;
      max-height: 400px;
      overflow-y: auto;
    }

    .news-item {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
      padding-bottom: 10px;
      border-bottom: 1px solid #f1f1f1;
    }

    .news-item img {
      width: 80px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }

    .news-item h6 {
      margin: 0;
      font-size: 0.9rem;
      color: #343a40;
      font-weight: 600;
    }

    .news-item p {
      margin: 0;
      font-size: 0.8rem;
      color: #6c757d;
    }

    @media (min-width: 992px) {
      .right-container {
        position: relative; /* Jangan fixed */
        margin: 20px; /* Atur margin */
      }

      .main-content {
        margin-right: 0; /* Pastikan konten utama tidak terdorong */
      }
    }

    @media (max-width: 991px) {
      .right-container {
        width: 100%;
        margin: 20px 0;
        border-radius: 0;
      }
    }
  </style>
</head>
<body>
  <div class="container-wrapper">
    <!-- Sidebar Component -->
    <div class="right-container">
      <div class="search-bar">
        <input type="text" placeholder="Search news...">
        <button type="button">
          <i class="bi bi-search"></i>
        </button>
      </div>
      @foreach($berita as $item)
      <a href="{{ route("berita_id.show", $item->id) }}" >
      <div class="news-content">
        <div class="news-item">
          <img src="{{ route('image.show', $item->file->id) }}" 
          alt="Main Content Image"
          class="card-img-top"
          style="object-fit: cover; border-radius:5px;"
          >
          <div>
            <h6>{{ $item->judul }}</h6>
            <p>{{ Str::limit($item->content, 200) }}</p>
          </div>
        </div>
      </div>
      </a>
      @endforeach
    </div>
  </div>
</body>
</html>
