<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-5">
      </div>
        <div class="col-sm-4 float-sm-right">
            <h1>Ajouter Une Correction</h1>
        </div>
      <div class="col-sm-3">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ajouter-correction</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
      <div class="col-md-4"></div>
    <div class="col-md-8">
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Information sur la Correction</h3>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Nom de la correction</label>
            <input type="text" id="inputName" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputDescription">Lien de la correction</label>
            <textarea id="inputDescription" class="form-control" rows="4"></textarea>
          </div>
            <div class="form-group">
                <label>Sujet concern&eacute;e</label>
                <select class="form-control select2 select2-secondary" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option selected="selected" value="bts">sujet_bts</option>
                    <option value="examen">sujet2_2020</option>
                    <option value="projet">sujet_3</option>
                    <option value="devoir">sujet_4</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

      <!-- /.card -->
    </div>
  </div>
  <div class="row">
    <div class="col-4 justify-content-center">
    </div>
      <div class="col-8">
          <a href="#" class="btn btn-secondary toastrDefaultWarning">Annuler</a>
          <input type="submit" value="Ajouter le Correction" class="btn btn-success float-right toastrDefaultSuccess">
      </div>
  </div>
</section>