<h2>Cadastro de Unidades</h2>
<form action="/unidade/create" method="POST">
    <div class="mb-3">
        <label for="unidade" class="form-label">Unidade</label>
        <input type="text" class="form-control" id="unidade" name="unidade" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Unidades</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Unidade</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['unidades'] as $unidade) { ?>
    <tr>
      <td><?= $unidade['id'] ?></td>
      <td><?= $unidade['unidade'] ?></td>
      <td><?= $unidade['descricao'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $unidade['id'] ?>" data-unidade="<?= $unidade['unidade'] ?>" data-descricao="<?= $unidade['descricao'] ?>">Editar</button>
        <a href="/unidade/deleteById/<?= $unidade['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Unidade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/unidade/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-unidade" class="form-label">Unidade</label>
              <input type="text" class="form-control" id="edit-unidade" name="unidade" required>
          </div>
          <div class="mb-3">
              <label for="edit-descricao" class="form-label">Descrição</label>
              <textarea class="form-control" id="edit-descricao" name="descricao" rows="3"></textarea>
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
      var unidade = button.getAttribute('data-unidade')
      var descricao = button.getAttribute('data-descricao')

      var modalIdInput = editModal.querySelector('#edit-id')
      var modalUnidadeInput = editModal.querySelector('#edit-unidade')
      var modalDescricaoInput = editModal.querySelector('#edit-descricao')

      modalIdInput.value = id
      modalUnidadeInput.value = unidade
      modalDescricaoInput.value = descricao
    })
</script>
