    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola User</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id User</th>
              <th scope="col">Nama User</th>
              <th scope="col">Alamat User</th>
              <th scope="col">No HP User</th>
              <th scope="col">Email User</th>
              <th scope="col">Password User</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($user as $aUser){?>
            <tr>
                <td><?=$aUser->id_user?></td>
                <td><?=$aUser->nama_user?></td>
                <td><?=$aUser->alamat_user?></td>
                <td><?=$aUser->no_hp_user?></td>
                <td><?=$aUser->email_user?></td>
                <td><?=$aUser->password_user?></td>
                <td><?=$aUser->nama_role?></td>
                <td>
                <a href="<?php echo base_url("edit-user/".$aUser->id_user)?>" class="btn btn-sm btn-info">Edit</a>
                <a href="<?php echo base_url("delete-user/".$aUser->id_user)?>" class="btn btn-sm btn-danger">delete</a>
                </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </main>

            
