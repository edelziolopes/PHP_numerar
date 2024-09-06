<h2>Cadastro de Alinhamentos</h2>
<form action="/alinhamento/create" method="POST">
    <div class="mb-3">
        <label for="id_habilidade" class="form-label">Habilidade</label>
        <select class="form-control" id="id_habilidade" name="id_habilidade" required>
            <?php foreach ($data['habilidades'] as $habilidade) { ?>
                <option value="<?= $habilidade['id'] ?>"><?= $habilidade['habilidade'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_descritor" class="form-label">Descritor</label>
        <select class="form-control" id="id_descritor" name="id_descritor" required>
            <?php foreach ($data['descritores'] as $descritor) { ?>
                <option value="<?= $descritor['id'] ?>"><?= $descritor['descritor'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Alinhamentos</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Habilidade</th>
      <th scope="col">Descritor</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['alinhamentos'] as $alinhamento) { ?>
    <tr>
      <td><?= $alinhamento['id'] ?></td>
      <td><?= $alinhamento['habilidade'] ?></td>
      <td><?= $alinhamento['descritor'] ?></td>
      <td><?= $alinhamento['descricao'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $alinhamento['id'] ?>" data-id_habilidade="<?= $alinhamento['id_habilidade'] ?>" data-id_descritor="<?= $alinhamento['id_descritor'] ?>" data-descricao="<?= $alinhamento['descricao'] ?>">Editar</button>
        <a href="/alinhamento/deleteById/<?= $alinhamento['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Alinhamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/alinhamento/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-id_habilidade" class="form-label">Habilidade</label>
              <select class="form-control" id="edit-id_habilidade" name="id_habilidade" required>
                <?php foreach ($data['habilidades'] as $habilidade) { ?>
                    <option value="<?= $habilidade['id'] ?>"><?= $habilidade['habilidade'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-id_descritor" class="form-label">Descritor</label>
              <select class="form-control" id="edit-id_descritor" name="id_descritor" required>
                <?php foreach ($data['descritores'] as $descritor) { ?>
                    <option value="<?= $descritor['id'] ?>"><?= $descritor['descritor'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-descricao" class="form-label">Descrição</label>
              <textarea class="form-control" id="edit-descricao" name="descricao" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var editModal = document.getElementById('editModal');
  editModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id');
    var idHabilidade = button.getAttribute('data-id_habilidade');
    var idDescritor = button.getAttribute('data-id_descritor');
    var descricao = button.getAttribute('data-descricao');

    var modalId = editModal.querySelector('#edit-id');
    var modalIdHabilidade = editModal.querySelector('#edit-id_habilidade');
    var modalIdDescritor = editModal.querySelector('#edit-id_descritor');
    var modalDescricao = editModal.querySelector('#edit-descricao');

    modalId.value = id;
    modalIdHabilidade.value = idHabilidade;
    modalIdDescritor.value = idDescritor;
    modalDescricao.value = descricao;
  });
</script>
