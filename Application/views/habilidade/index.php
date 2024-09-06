<h2>Cadastro de Habilidades</h2>
<form action="/habilidade/create" method="POST">
    <div class="mb-3">
        <label for="id_objeto" class="form-label">Objeto</label>
        <select class="form-control" id="id_objeto" name="id_objeto" required>
            <?php foreach ($data['objetos'] as $objeto) { ?>
                <option value="<?= $objeto['id'] ?>"><?= $objeto['objeto'] ?> - <?= $objeto['ano'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="habilidade" class="form-label">Habilidade</label>
        <input type="text" class="form-control" id="habilidade" name="habilidade" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Habilidades</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Objeto</th>
      <th scope="col">Habilidade</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['habilidades'] as $habilidade) { ?>
    <tr>
      <td><?= $habilidade['id'] ?></td>
      <td><?= $habilidade['objeto'] ?></td>
      <td><?= $habilidade['habilidade'] ?></td>
      <td><?= $habilidade['descricao'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $habilidade['id'] ?>" data-id_objeto="<?= $habilidade['id_objeto'] ?>" data-habilidade="<?= $habilidade['habilidade'] ?>" data-descricao="<?= $habilidade['descricao'] ?>">Editar</button>
        <a href="/habilidade/deleteById/<?= $habilidade['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Habilidade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/habilidade/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-id_objeto" class="form-label">Objeto</label>
              <select class="form-control" id="edit-id_objeto" name="id_objeto" required>
                <?php foreach ($data['objetos'] as $objeto) { ?>
                    <option value="<?= $objeto['id'] ?>"><?= $objeto['objeto'] ?> - <?= $objeto['ano'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-habilidade" class="form-label">Habilidade</label>
              <input type="text" class="form-control" id="edit-habilidade" name="habilidade" required>
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
    var idObjeto = button.getAttribute('data-id_objeto');
    var habilidade = button.getAttribute('data-habilidade');
    var descricao = button.getAttribute('data-descricao');

    var modalId = editModal.querySelector('#edit-id');
    var modalIdObjeto = editModal.querySelector('#edit-id_objeto');
    var modalHabilidade = editModal.querySelector('#edit-habilidade');
    var modalDescricao = editModal.querySelector('#edit-descricao');

    modalId.value = id;
    modalIdObjeto.value = idObjeto;
    modalHabilidade.value = habilidade;
    modalDescricao.value = descricao;
  });
</script>

   
