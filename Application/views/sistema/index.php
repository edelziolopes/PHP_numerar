<h2>Cadastro de Sistemas</h2>
<form action="/sistema/create" method="POST">
    <div class="mb-3">
        <label for="sistema" class="form-label">Sistema</label>
        <input type="text" class="form-control" id="sistema" name="sistema" required>
    </div>
    <div class="mb-3">
        <label for="uf" class="form-label">UF</label>
        <input type="text" class="form-control" id="uf" name="uf" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Sistemas</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Sistema</th>
      <th scope="col">UF</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['sistemas'] as $sistema) { ?>
    <tr>
      <td><?= $sistema['id'] ?></td>
      <td><?= $sistema['sistema'] ?></td>
      <td><?= $sistema['uf'] ?></td>
      <td><?= $sistema['descricao'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $sistema['id'] ?>" data-sistema="<?= $sistema['sistema'] ?>" data-uf="<?= $sistema['uf'] ?>" data-descricao="<?= $sistema['descricao'] ?>">Editar</button>
        <a href="/sistema/deleteById/<?= $sistema['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Sistema</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/sistema/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-sistema" class="form-label">Sistema</label>
              <input type="text" class="form-control" id="edit-sistema" name="sistema" required>
          </div>
          <div class="mb-3">
              <label for="edit-uf" class="form-label">UF</label>
              <input type="text" class="form-control" id="edit-uf" name="uf" required>
          </div>
          <div class="mb-3">
              <label for="edit-descricao" class="form-label">Descrição</label>
              <textarea class="form-control" id="edit-descricao" name="descricao" rows="3" required></textarea>
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
      var sistema = button.getAttribute('data-sistema')
      var uf = button.getAttribute('data-uf')
      var descricao = button.getAttribute('data-descricao')

      var modalIdInput = editModal.querySelector('#edit-id')
      var modalSistemaInput = editModal.querySelector('#edit-sistema')
      var modalUfInput = editModal.querySelector('#edit-uf')
      var modalDescricaoInput = editModal.querySelector('#edit-descricao')

      modalIdInput.value = id
      modalSistemaInput.value = sistema
      modalUfInput.value = uf
      modalDescricaoInput.value = descricao
    })
</script>
