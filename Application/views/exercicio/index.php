<h2>Cadastro de Exercícios</h2>
<form action="/exercicio/create" method="POST">
    <div class="mb-3">
        <label for="id_alinhamento" class="form-label">Alinhamento</label>
        <select class="form-control" id="id_alinhamento" name="id_alinhamento" required>
            <?php foreach ($data['alinhamentos'] as $alinhamento) { ?>
                <option value="<?= $alinhamento['id'] ?>"><?= $alinhamento['descricao'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="situacao" class="form-label">Situação</label>
        <input type="number" class="form-control" id="situacao" name="situacao" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Exercícios</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Alinhamento</th>
      <th scope="col">Título</th>
      <th scope="col">Descrição</th>
      <th scope="col">Situação</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['exercicios'] as $exercicio) { ?>
    <tr>
      <td><?= $exercicio['id'] ?></td>
      <td><?= $exercicio['alinhamento'] ?></td>
      <td><?= $exercicio['titulo'] ?></td>
      <td><?= $exercicio['descricao'] ?></td>
      <td><?= $exercicio['situacao'] ?></td>
      <td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $exercicio['id'] ?>" data-id_alinhamento="<?= $exercicio['id_alinhamento'] ?>" data-titulo="<?= $exercicio['titulo'] ?>" data-descricao="<?= $exercicio['descricao'] ?>" data-situacao="<?= $exercicio['situacao'] ?>">Editar</button>
        <a href="/exercicio/deleteById/<?= $exercicio['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Exercício</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/exercicio/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-id_alinhamento" class="form-label">Alinhamento</label>
              <select class="form-control" id="edit-id_alinhamento" name="id_alinhamento" required>
                <?php foreach ($data['alinhamentos'] as $alinhamento) { ?>
                    <option value="<?= $alinhamento['id'] ?>"><?= $alinhamento['descricao'] ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="edit-titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="edit-titulo" name="titulo" required>
          </div>
          <div class="mb-3">
              <label for="edit-descricao" class="form-label">Descrição</label>
              <textarea class="form-control" id="edit-descricao" name="descricao" rows="3" required></textarea>
          </div>
          <div class="mb-3">
              <label for="edit-situacao" class="form-label">Situação</label>
              <input type="number" class="form-control" id="edit-situacao" name="situacao" required>
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
    var idAlinhamento = button.getAttribute('data-id_alinhamento');
    var titulo = button.getAttribute('data-titulo');
    var descricao = button.getAttribute('data-descricao');
    var situacao = button.getAttribute('data-situacao');

    var modalId = editModal.querySelector('#edit-id');
    var modalIdAlinhamento = editModal.querySelector('#edit-id_alinhamento');
    var modalTitulo = editModal.querySelector('#edit-titulo');
    var modalDescricao = editModal.querySelector('#edit-descricao');
    var modalSituacao = editModal.querySelector('#edit-situacao');

    modalId.value = id;
    modalIdAlinhamento.value = idAlinhamento;
    modalTitulo.value = titulo;
    modalDescricao.value = descricao;
    modalSituacao.value = situacao;
  });
</script>
