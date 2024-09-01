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
                <a href="editar.php?id=<?= $nivel['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="/nivel/deleteById/<?= $nivel['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>