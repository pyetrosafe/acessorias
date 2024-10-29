        <h5>Clients</h5>

        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">E-mail</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($clients as $row) { ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['email']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <?php include_once $_view['yeld']; ?>

        </div>
