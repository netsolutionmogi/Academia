<nav class='navbar navbar-expand navbar-light navbar-bg'>
    <a class='sidebar-toggle js-sidebar-toggle'>
        <i class='hamburger align-self-center'></i>
    </a>

    <div class='navbar-collapse collapse'>
        <ul class='navbar-nav navbar-align'>
            <li class='nav-item dropdown'>

                <div class='dropdown-menu dropdown-menu-lg dropdown-menu-end py-0' aria-labelledby='alertsDropdown'>

                    <div class='list-group'>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <i class='text-danger' data-feather='alert-circle'></i>
                                </div>
                                <div class='col-10'>
                                    <div class='text-dark'>Update completed</div>
                                    <div class='text-muted small mt-1'>Restart server 12 to complete the update.</div>
                                    <div class='text-muted small mt-1'>30m ago</div>
                                </div>
                            </div>
                        </a>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <i class='text-warning' data-feather='bell'></i>
                                </div>
                                <div class='col-10'>
                                    <div class='text-dark'>Lorem ipsum</div>
                                    <div class='text-muted small mt-1'>Aliquam ex eros, imperdiet vulputate hendrerit
                                        et.</div>
                                    <div class='text-muted small mt-1'>2h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <i class='text-primary' data-feather='home'></i>
                                </div>
                                <div class='col-10'>
                                    <div class='text-dark'>Login from 192.186.1.8</div>
                                    <div class='text-muted small mt-1'>5h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <i class='text-success' data-feather='user-plus'></i>
                                </div>
                                <div class='col-10'>
                                    <div class='text-dark'>New connection</div>
                                    <div class='text-muted small mt-1'>Christina accepted your request.</div>
                                    <div class='text-muted small mt-1'>14h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--<div class = 'dropdown-menu-footer'>
<a href = '#' class = 'text-muted'>Show all notifications</a>
</div>-->
                </div>
            </li>
            <li class='nav-item dropdown'>

                <div class='dropdown-menu dropdown-menu-lg dropdown-menu-end py-0' aria-labelledby='messagesDropdown'>
                    <div class='dropdown-menu-header'>

                    </div>
                    <div class='list-group'>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <img src='img/avatars/avatar-5.jpg' class='avatar img-fluid rounded-circle'
                                        alt='Vanessa Tucker'>
                                </div>
                                <div class='col-10 ps-2'>
                                    <div class='text-dark'>Vanessa Tucker</div>
                                    <div class='text-muted small mt-1'>Nam pretium turpis et arcu. Duis arcu tortor.
                                    </div>
                                    <div class='text-muted small mt-1'>15m ago</div>
                                </div>
                            </div>
                        </a>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <img src='img/avatars/avatar-2.jpg' class='avatar img-fluid rounded-circle'
                                        alt='William Harris'>
                                </div>
                                <div class='col-10 ps-2'>
                                    <div class='text-dark'>William Harris</div>
                                    <div class='text-muted small mt-1'>Curabitur ligula sapien euismod vitae.</div>
                                    <div class='text-muted small mt-1'>2h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <img src='img/avatars/avatar-4.jpg' class='avatar img-fluid rounded-circle'
                                        alt='Christina Mason'>
                                </div>
                                <div class='col-10 ps-2'>
                                    <div class='text-dark'>Christina Mason</div>
                                    <div class='text-muted small mt-1'>Pellentesque auctor neque nec urna.</div>
                                    <div class='text-muted small mt-1'>4h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href='#' class='list-group-item'>
                            <div class='row g-0 align-items-center'>
                                <div class='col-2'>
                                    <img src='img/avatars/avatar-3.jpg' class='avatar img-fluid rounded-circle'
                                        alt='Sharon Lessman'>
                                </div>
                                <div class='col-10 ps-2'>
                                    <div class='text-dark'>Sharon Lessman</div>
                                    <div class='text-muted small mt-1'>Aenean tellus metus, bibendum sed, posuere ac,
                                        mattis non.</div>
                                    <div class='text-muted small mt-1'>5h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class='dropdown-menu-footer'>
                        <a href='#' class='text-muted'>Show all messages</a>
                    </div>
                </div>
            </li>
            <li class='nav-item dropdown'>
                <a class='nav-icon dropdown-toggle d-inline-block d-sm-none' href='#' data-bs-toggle='dropdown'>
                    <i class='align-middle' data-feather='settings'></i>
                </a>
                <a class='nav-link dropdown-toggle d-none d-sm-inline-block' href='#' data-bs-toggle='dropdown'>
                    <?php
                if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
                            ?>
                    <img src='./upload/image/<?php echo $_SESSION['foto_Aluno'];?>'
                        class='avatar img-fluid rounded me-1' alt='Aluno' /> <span class='text-dark'>

                        <?php
                        } else {
                            if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
                                ?>
                        <img src='./upload/instrutor/<?php echo $_SESSION['foto_Instrutor'];?>'
                            class='avatar img-fluid rounded me-1' alt='Instrutor' /> <span class='text-dark'>
                            <?php
                            }else{
                                if ( isset($_SESSION[ 'Recepcionista' ]) == 'Recepcionista' ) {
                                    ?>
                            <img src='./upload/Recepcionista/<?php echo $_SESSION['foto_Recepcionista'];?>'
                                class='avatar img-fluid rounded me-1' alt='Recepcionista' /> <span class='text-dark'>
                                <?php
                                }  
                            }
                        }
                          
                        if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
                            
                            echo $_SESSION[ 'login_Aluno' ];
                        } else {
                            if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
                                echo $_SESSION[ 'login_Instrutor' ];
                            }else{
                                if ( isset($_SESSION[ 'Recepcionista' ]) == 'Recepcionista' ) {
                                    echo $_SESSION[ 'login_Recepcionista' ];
                                }  
                            }
                        }
                        ?></span>
                </a>
                <div class='dropdown-menu dropdown-menu-end'>
                    <?php
                        if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
                            ?>
                    <a class='dropdown-item' href='logout.php'><i class='align-middle me-1'
                            data-feather='help-circle'></i>
                        Sair</a>
                    <?php
                        } else {
                            if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
                                ?>
                    <a class='dropdown-item' href='logout.php'><i class='align-middle me-1'
                            data-feather='help-circle'></i>
                        Sair</a>
                    <?php
                            }else{
                                if ( isset($_SESSION[ 'Recepcionista' ]) == 'Recepcionista' ) {
                                    ?>
                    <a class='dropdown-item' href='logout.php'><i class='align-middle me-1'
                            data-feather='help-circle'></i>
                        Sair</a>
                    <?php
                                }  
                            }
                        }
                        ?>



                </div>
            </li>
        </ul>
    </div>
</nav>