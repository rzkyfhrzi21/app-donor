<div class="page-heading">
    <!--  Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Pribadi</h4>
                    </div>
                    <form action="../functions/tes.php" method="post" enctype="multipart/form-data" class="form" data-parsley-validate>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="img_kegiatan" class="form-label">Multiple</label>
                                            <p><small class="text-bold"><code>* File melebihi 1 MB & bukan gambar tidak akan disimpan</code></small></p>
                                            <input type="file" id="img_kegiatan" name="img_kegiatan[]" data-max-file-size="1MB" image-crop-aspect-ratio="1:1" class="image-resize-filepond" multiple required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit -->
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" name="upload_imgkegiatan" class="btn btn-primary me-1 mb-1">
                                            Simpan
                                        </button>
                                        <button
                                            type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                                <!-- Submit -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>