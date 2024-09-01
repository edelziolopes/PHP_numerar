<h2>Cadastro de Anos</h2>
<form action="/ano/create" method="POST">
    <div class="mb-3">
        <label for="id_nivel" class="form-label">Nível</label>
        <select class="form-control" id="id_nivel" name="id_nivel" required>
            <?php foreach ($data['niveis'] as $nivel) { ?>
                <option value="<?= $nivel['id'] ?>"><?= $nivel['nivel'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="ano" class="form-label">Ano</label>
        <input type="text" class="form-control" id="ano" name="ano" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Anos</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nível</th>
      <th scope="col">Ano</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['anos'] as $ano) { ?>
    <tr>
      <td><?= $ano['id'] ?></td>
      <td><?= $ano['nivel'] ?></td>
      <td><?= $ano['ano'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $ano['id'] ?>" data-id_nivel="<?= $ano['id_nivel'] ?>" data-ano="<?= $ano['ano'] ?>">Editar</button>
        <a href="/ano/deleteById/<?= $ano['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Ano</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/ano/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-id_nivel" class="form-label">Nível</label>
              <select class="form-control" id="edit-id_nivel" name="id_nivel" required>
                <?php foreach ($data['niveis'] as $nivel) { ?>
                    <option value="<?= $nivel['id'] ?>"><?= $nivel['nivel'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-ano" class="form-label">Ano</label>
              <input type="text" class="form-control" id="edit-ano" name="ano" required>
          </div>
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    var editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget
      var id = button.getAttribute('data-id')
      var id_nivel = button.getAttribute('data-id_nivel')
      var ano = button.getAttribute('data-ano')

      var modalIdInput = editModal.querySelector('#edit-id')
      var modalIdNivelInput = editModal.querySelector('#edit-id_nivel')
      var modalAnoInput = editModal.querySelector('#edit-ano')

      modalIdInput.value = id
      modalIdNivelInput.value = id_nivel
      modalAnoInput.value = ano
    })
</script>
