@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Berita</h4>
        <p class="text-muted mb-0">Perbarui informasi berita sekolah</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.berita.update', $berita->id_berita) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Berita</label>
                    <input type="text" name="judul"
                           class="form-control"
                           value="{{ old('judul', $berita->judul) }}"
                           maxlength="50" required>
                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Berita</label>
                    <textarea name="isi" rows="6"
                              class="form-control"
                              required>{{ old('isi', $berita->isi) }}</textarea>
                    @error('isi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}"
                           required>
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar Saat Ini</label>

                    @if($berita->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$berita->gambar) }}"
                                 width="130"
                                 class="rounded"
                                 alt="Gambar berita">
                        </div>
                    @else
                        <p class="text-muted">Belum ada gambar.</p>
                    @endif

                    <input type="file" name="gambar"
                           class="form-control"
                           accept="image/*">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>

                    @error('gambar')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Publish"
                            {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>
                            Publish
                        </option>
                        <option value="Draft"
                            {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>
                            Draft
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Penulis</label>
                    <select name="id_user" class="form-select" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id_user }}"
                                {{ old('id_user', $berita->id_user) == $user->id_user ? 'selected' : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.berita.berita') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
