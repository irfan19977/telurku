@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

    <!-- Responsive Table -->
    <div class="card">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center px-3">
              <h5 class="card-header m-0">Table Produk</h5>
              <div class="btn-container">
                <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
              </div>
            </div>
          

        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Keterangan</th>
                <th>Stok</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($products as $product)
                 <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->keterangan }}</td>
                <td>{{ $product->stok }}</td>
                <td>
                  <form onclick="return confirm('are you sure ?');" action="{{ route('produk.destroy', $product->id) }}" method="post">
                    @csrf 
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</i></button>
                </form>
                </td>
              </tr> 
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    <!--/ Responsive Table -->
  </div>
</div>

<script>
  function confirmDelete(id) {
      if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
          deleteProduct(id);
      }
  }

  function deleteProduct(id) {
      fetch(`/products/${id}`, {
          method: 'DELETE',
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Content-Type': 'application/json'
          }
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Gagal menghapus produk');
          }
          // Refresh halaman atau update tampilan setelah penghapusan
          window.location.reload();
      })
      .catch(error => {
          console.error(error);
          alert('Gagal menghapus produk.');
      });
  }
</script>
@endsection