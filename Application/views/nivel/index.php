<h2>Cadastro de Níveis</h2>
<form action="/nivel/create" method="POST">
    <div class="mb-3">
        <label for="nivel" class="form-label">Nível</label>
        <input type="text" class="form-control" id="nivel" name="nivel" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Níveis</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nível</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['niveis'] as $nivel) { ?>
    <tr>
      <td><?= $nivel['id'] ?></td>
      <td><?= $nivel['nivel'] ?></td>
      <td><?= $nivel['descricao'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $nivel['id'] ?>" data-nivel="<?= $nivel['nivel'] ?>" data-descricao="<?= $nivel['descricao'] ?>">Editar</button>
        <a href="/nivel/delete/<?= $nivel['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Nível</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/nivel/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-nivel" class="form-label">Nível</label>
              <input type="text" class="form-control" id="edit-nivel" name="nivel" required>
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
      var nivel = button.getAttribute('data-nivel')
      var descricao = button.getAttribute('data-descricao')

      var modalIdInput = editModal.querySelector('#edit-id')
      var modalNivelInput = editModal.querySelector('#edit-nivel')
      var modalDescricaoInput = editModal.querySelector('#edit-descricao')

      modalIdInput.value = id
      modalNivelInput.value = nivel
      modalDescricaoInput.value = descricao
    })
</script>
