<?php

require __DIR__ . '/../../src/bootstrap.php';
// require __DIR__ . '/../../src/login.php';
require __DIR__ . '/../../src/user.php';
require_login();
?>

<?php view('admin_header', ['title' => 'Home Admin']) ?>

<?php if (isset($errors['login'])): ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../../src/assets/img/profile_small.jpg" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                        class="font-bold"><?php echo $_SESSION['username']; ?></strong>
                                </span> <span class="text-muted text-xs block">Admin<b class="caret"></b></span> </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="home_admin.php"><i class="fa fa-tachometer"></i> <span
                            class="nav-label">Dashboards</span></a>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">System Admin</span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="active"><a href="data_user.php">Data User</a></li>
                        <li><a href="data_mobil.php">Data Mobil</a></li>
                        <li><a href="data_pemesanan.php">Data Pemesanan</a></li>
                        <li><a href="data_pembayaran.php">Data Pembayaran</a></li>
                        <li><a href="data_pengembalian.php">Data Pengembalian</a></li>
                        <li><a href="dashboard_5.php">Data Denda</a></li>
                        <li><a href="dashboard_5.html">Data Bonus</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control"
                                name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <li>
                        <a class="right-sidebar-toggle">
                            <i class="fa fa-tasks"></i>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>


        <div class="wrapper wrapper-content">

            <!--Body Content-->
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data User</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="data_user.php">Admin</a>
                        </li>
                        <li>
                            <a>System Admin</a>
                        </li>
                        <li class="active">
                            <strong>Data User</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Table Users</h5>
                        <div class="ibox-tools">

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="m-t" action="../../src/user.php" method="POST">
                                                <input name="action" value="tambah" type="hidden">
                                                <div class="form-group">
                                                    <!-- <input type="text" class="form-control" placeholder="Name" required=""> -->
                                                    <input type="text" name="username" id="username"
                                                        value="<?= $inputs['username'] ?? '' ?>" class="form-control"
                                                        placeholder="Username" required="">

                                                </div>
                                                <div class="form-group">
                                                    <!-- <input type="email" class="form-control" placeholder="Email" required=""> -->
                                                    <input type="text" name="alamat" id="alamat"
                                                        value="<?= $inputs['alamat'] ?? '' ?>" class="form-control"
                                                        placeholder="Alamat" required="">

                                                </div>
                                                <div class="form-group">
                                                    <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                                                    <input type="number" name="no_telepon" id="no_telepon"
                                                        value="<?= $inputs['no_telepon'] ?? '' ?>" class="form-control"
                                                        placeholder="Nomer HP" required="">

                                                </div>
                                                <div class="form-group">
                                                    <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                                                    <input type="email" name="email" id="email"
                                                        value="<?= $inputs['email'] ?? '' ?>" class="form-control"
                                                        placeholder="Email" required="">

                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="role">
                                                        <option value="Pelanggan">Pelanggan</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                                                    <input type="password" name="password" id="password"
                                                        value="<?= $inputs['password'] ?? '' ?>" class="form-control"
                                                        placeholder="Password">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="checkbox i-checks"><label for="agree">
                                                            <div class="icheckbox_square-green"
                                                                style="position: relative;"><input type="checkbox"
                                                                    style="position: absolute; opacity: 0;"><ins
                                                                    class="iCheck-helper"
                                                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                            </div><i></i> <input type="checkbox" name="agree" value="1"
                                                                <?//php echo isset($inputs['agree']) ? 'checked' : ''; ?>
                                                                required> I agree to the terms of service

                                                        </label><br>
                                                    </div>
                                                </div>             -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"
                                                value="<?= $inputs['action'] = 'tambah'; ?>">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="modalBody">
                                            <form class="m-t" action="../../src/user.php" method="POST" id="editForm">
                                                <input name="action" value="edit" type="hidden">
                                                <div id="formContainer"></div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" form="editForm">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>

                        </div>

                    </div>
                    <div class="ibox-content">

                        <form id="deleteForm" method="POST" action="../../src/admin_user.php">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>checkbox</th>
                                        <th>id</th>
                                        <th>username</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr onclick="toggleCheckbox(this)">
                                            <td><input type="checkbox" name="select_user[]"
                                                    value="<?= htmlspecialchars($user['id_user'], ENT_QUOTES, 'UTF-8') ?>">
                                            </td>
                                            <td><?= htmlspecialchars($user['id_user'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($user['alamat'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($user['no_telepon'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-danger">Delete</button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Tambah
                            </button>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal1" id="editButton">
                                Edit
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

    </div>
    <div id="right-sidebar">
        <div class="sidebar-container">

            <ul class="nav nav-tabs navs-3">

                <li class="active"><a data-toggle="tab" href="#tab-1">
                        Notes
                    </a></li>
                <li><a data-toggle="tab" href="#tab-2">
                        Projects
                    </a></li>
                <li class=""><a data-toggle="tab" href="#tab-3">
                        <i class="fa fa-gear"></i>
                    </a></li>
            </ul>

            <div class="tab-content">


                <div id="tab-1" class="tab-pane active">

                    <div class="sidebar-title">
                        <h3> <i class="fa fa-comments-o"></i> Latest Notes</h3>
                        <small><i class="fa fa-tim"></i> You have 10 new message.</small>
                    </div>

                    <div>

                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a1.jpg">

                                    <div class="m-t-xs">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="media-body">

                                    There are many variations of passages of Lorem Ipsum available.
                                    <br>
                                    <small class="text-muted">Today 4:21 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a2.jpg">
                                </div>
                                <div class="media-body">
                                    The point of using Lorem Ipsum is that it has a more-or-less normal.
                                    <br>
                                    <small class="text-muted">Yesterday 2:45 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                    <div class="m-t-xs">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    Mevolved over the years, sometimes by accident, sometimes on purpose (injected
                                    humour and the like).
                                    <br>
                                    <small class="text-muted">Yesterday 1:10 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                </div>

                                <div class="media-body">
                                    Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                    <br>
                                    <small class="text-muted">Monday 8:37 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a8.jpg">
                                </div>
                                <div class="media-body">

                                    All the Lorem Ipsum generators on the Internet tend to repeat.
                                    <br>
                                    <small class="text-muted">Today 4:21 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a7.jpg">
                                </div>
                                <div class="media-body">
                                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                                    from a line in section 1.10.32.
                                    <br>
                                    <small class="text-muted">Yesterday 2:45 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                    <div class="m-t-xs">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.
                                    <br>
                                    <small class="text-muted">Yesterday 1:10 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                </div>
                                <div class="media-body">
                                    Uncover many web sites still in their infancy. Various versions have.
                                    <br>
                                    <small class="text-muted">Monday 8:37 pm</small>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div id="tab-2" class="tab-pane">

                    <div class="sidebar-title">
                        <h3> <i class="fa fa-cube"></i> Latest projects</h3>
                        <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                    </div>

                    <ul class="sidebar-list">
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Business valuation</h4>
                                It is a long established fact that a reader will be distracted.

                                <div class="small">Completion with: 22%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                </div>
                                <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Contract with Company </h4>
                                Many desktop publishing packages and web page editors.

                                <div class="small">Completion with: 48%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%;" class="progress-bar"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Meeting</h4>
                                By the readable content of a page when looking at its layout.

                                <div class="small">Completion with: 14%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-primary pull-right">NEW</span>
                                <h4>The generated</h4>
                                <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                There are many variations of passages of Lorem Ipsum available.
                                <div class="small">Completion with: 22%</div>
                                <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Business valuation</h4>
                                It is a long established fact that a reader will be distracted.

                                <div class="small">Completion with: 22%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                </div>
                                <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Contract with Company </h4>
                                Many desktop publishing packages and web page editors.

                                <div class="small">Completion with: 48%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%;" class="progress-bar"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Meeting</h4>
                                By the readable content of a page when looking at its layout.

                                <div class="small">Completion with: 14%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-primary pull-right">NEW</span>
                                <h4>The generated</h4>
                                <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                There are many variations of passages of Lorem Ipsum available.
                                <div class="small">Completion with: 22%</div>
                                <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                            </a>
                        </li>

                    </ul>

                </div>

                <div id="tab-3" class="tab-pane">

                    <div class="sidebar-title">
                        <h3><i class="fa fa-gears"></i> Settings</h3>
                        <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                    </div>

                    <div class="setings-item">
                        <span>
                            Show notifications
                        </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                <label class="onoffswitch-label" for="example">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>
                            Disable Chat
                        </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox"
                                    id="example2">
                                <label class="onoffswitch-label" for="example2">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>
                            Enable history
                        </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                <label class="onoffswitch-label" for="example3">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>
                            Show charts
                        </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                <label class="onoffswitch-label" for="example4">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>
                            Offline users
                        </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox"
                                    id="example5">
                                <label class="onoffswitch-label" for="example5">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>
                            Global search
                        </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox"
                                    id="example6">
                                <label class="onoffswitch-label" for="example6">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>
                            Update everyday
                        </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                <label class="onoffswitch-label" for="example7">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-content">
                        <h4>Settings</h4>
                        <div class="small">
                            I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            And typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                            the 1500s.
                            Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </div>
                    </div>

                </div>
            </div>

        </div>



    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function toggleCheckbox(row) {
        const checkbox = row.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
    }

    // Optional: Prevent checkbox click event from propagating to row click event
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });
</script>

<!--Checkbox listener-->
<!-- <script>
    function toggleCheckbox(row) {
        const checkbox = row.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
    }

    // Optional: Prevent checkbox click event from propagating to row click event
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });

    $(document).ready(function () {
        $('#editButton').on('click', function () {
            const selectedUsers = $('.select-user:checked');
            const formContainer = $('#formContainer');
            formContainer.empty(); // Clear previous forms

            if (selectedUsers.length === 0) {
                alert('Please select at least one user to edit.');
                return;
            }

            selectedUsers.each(function (index, element) {
                const userId = $(element).data('user-id');
                const username = $(element).data('username');
                const alamat = $(element).data('alamat');
                const noTelepon = $(element).data('no-telepon');
                const email = $(element).data('email');
                const role = $(element).data('role');

                formContainer.append(`
                    <div class="user-form">
                        <input type="hidden" name="users[${index}][id_user]" value="${userId}">
                        <div class="form-group">
                            <label for="username_${index}">Username</label>
                            <input type="text" name="users[${index}][username]" id="username_${index}" value="${username}" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_${index}">Alamat</label>
                            <input type="text" name="users[${index}][alamat]" id="alamat_${index}" value="${alamat}" class="form-control" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon_${index}">No Telepon</label>
                            <input type="number" name="users[${index}][no_telepon]" id="no_telepon_${index}" value="${noTelepon}" class="form-control" placeholder="No Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="email_${index}">Email</label>
                            <input type="email" name="users[${index}][email]" id="email_${index}" value="${email}" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="role_${index}">Role</label>
                            <select class="form-control" name="users[${index}][role]" id="role_${index}">
                                <option value="Pelanggan" ${role === 'Pelanggan' ? 'selected' : ''}>Pelanggan</option>
                                <option value="Pegawai" ${role === 'Pegawai' ? 'selected' : ''}>Pegawai</option>
                            </select>
                        </div>
                        <hr>
                    </div>
                `);
            });

            $('#exampleModal1').modal('show');
        });
    });
</script> -->

<?php view('admin_footer') ?>