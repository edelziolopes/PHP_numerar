<h2>Cadastro de Descritores</h2>
<form action="/descritor/create" method="POST">
    <div class="mb-3">
        <label for="id_sistema" class="form-label">Sistema</label>
        <select class="form-control" id="id_sistema" name="id_sistema" required>
            <?php foreach ($data['sistemas'] as $sistema) { ?>
                <option value="<?= $sistema['id'] ?>"><?= $sistema['sistema'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="descritor" class="form-label">Descritor</label>
        <input type="text" class="form-control" id="descritor" name="descritor" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Descritores</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Sistema</th>
      <th scope="col">Descritor</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['descritores'] as $descritor) { ?>
    <tr>
      <td><?= $descritor['id'] ?></td>
      <td><?= $descritor['sistema'] ?></td>
      <td><?= $descritor['descritor'] ?></td>
      <td><?= $descritor['descricao'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $descritor['id'] ?>" data-id_sistema="<?= $descritor['id_sistema'] ?>" data-descritor="<?= $descritor['descritor'] ?>" data-descricao="<?= $descritor['descricao'] ?>">Editar</button>
        <a href="/descritor/deleteById/<?= $descritor['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Modal para edição -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Descritor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/descritor/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-id_sistema" class="form-label">Sistema</label>
              <select class="form-control" id="edit-id_sistema" name="id_sistema" required>
                <?php foreach ($data['sistemas'] as $sistema) { ?>
                    <option value="<?= $sistema['id'] ?>"><?= $sistema['sistema'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-descritor" class="form-label">Descritor</label>
              <input type="text" class="form-control" id="edit-descritor" name="descritor" required>
          </div>
          <div class="mb-3">
              <label for="edit-descricao" class="form-label">Descrição</label>
              <textarea class="form-control" id="edit-descricao" name="descricao" rows="3" required></textarea>
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
    var idSistema = button.getAttribute('data-id_sistema');
    var descritor = button.getAttribute('data-descritor');
    var descricao = button.getAttribute('data-descricao');

    var modalId = editModal.querySelector('#edit-id');
    var modalIdSistema = editModal.querySelector('#edit-id_sistema');
    var modalDescritor = editModal.querySelector('#edit-descritor');
    var modalDescricao = editModal.querySelector('#edit-descricao');

    modalId.value = id;
    modalIdSistema.value = idSistema;
    modalDescritor.value = descritor;
    modalDescricao.value = descricao;
  });
</script>
