<h2>Cadastro de Objetos</h2>
<form action="/objeto/create" method="POST">
    <div class="mb-3">
        <label for="id_unidade" class="form-label">Unidade</label>
        <select class="form-control" id="id_unidade" name="id_unidade" required>
            <?php foreach ($data['unidades'] as $unidade) { ?>
                <option value="<?= $unidade['id'] ?>"><?= $unidade['unidade'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_ano" class="form-label">Ano</label>
        <select class="form-control" id="id_ano" name="id_ano" required>
            <?php foreach ($data['anos'] as $ano) { ?>
                <option value="<?= $ano['id'] ?>"><?= $ano['ano'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="objeto" class="form-label">Objeto</label>
        <textarea class="form-control" id="objeto" name="objeto" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Objetos</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Unidade</th>
      <th scope="col">Ano</th>
      <th scope="col">Objeto</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['objetos'] as $objeto) { ?>
    <tr>
      <td><?= $objeto['id'] ?></td>
      <td><?= $objeto['unidade'] ?></td>
      <td><?= $objeto['ano'] ?></td>
      <td><?= $objeto['objeto'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $objeto['id'] ?>" data-id_unidade="<?= $objeto['id_unidade'] ?>" data-id_ano="<?= $objeto['id_ano'] ?>" data-objeto="<?= $objeto['objeto'] ?>">Editar</button>
        <a href="/objeto/deleteById/<?= $objeto['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Objeto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/objeto/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-id_unidade" class="form-label">Unidade</label>
              <select class="form-control" id="edit-id_unidade" name="id_unidade" required>
                <?php foreach ($data['unidades'] as $unidade) { ?>
                    <option value="<?= $unidade['id'] ?>"><?= $unidade['unidade'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-id_ano" class="form-label">Ano</label>
              <select class="form-control" id="edit-id_ano" name="id_ano" required>
                <?php foreach ($data['anos'] as $ano) { ?>
                    <option value="<?= $ano['id'] ?>"><?= $ano['ano'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-objeto" class="form-label">Objeto</label>
              <textarea class="form-control" id="edit-objeto" name="objeto" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Script para preencher o modal com os dados atuais ao clicar em "Editar"
  var editModal = document.getElementById('editModal');
  editModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id');
    var idUnidade = button.getAttribute('data-id_unidade');
    var idAno = button.getAttribute('data-id_ano');
    var objeto = button.getAttribute('data-objeto');
    
    var modalId = editModal.querySelector('#edit-id');
    var modalIdUnidade = editModal.querySelector('#edit-id_unidade');
    var modalIdAno = editModal.querySelector('#edit-id_ano');
    var modalObjeto = editModal.querySelector('#edit-objeto');
    
    modalId.value = id;
    modalIdUnidade.value = idUnidade;
    modalIdAno.value = idAno;
    modalObjeto.value = objeto;
  });
</script>
