<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>M Ainul Rokhman</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Data Master',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Fakultas', 'icon' => 'university', 'url' => ['/fakultas']],
                            ['label' => 'Dosen', 'icon' => 'users', 'url' => ['/dosen']],
                            ['label' => 'Mahasiswa', 'icon' => 'graduation-cap', 'url' => ['/mahasiswa']],
                            ['label' => 'Mata Kuliah', 'icon' => 'book', 'url' => ['/mata-kuliah']],
                            ['label' => 'Prodi', 'icon' => 'list-alt', 'url' => ['/prodi']],
                            ['label' => 'Kelas', 'icon' => 'home', 'url' => ['/kelas']],
                            ['label' => 'Ruang Kelas', 'icon' => 'home', 'url' => ['/ruang']],
                            ['label' => 'Staff', 'icon' => 'users', 'url' => ['/staff']],
                            ['label' => 'Wilayah Administrasi', 'icon' => 'globe', 'url' => ['/wilayah']],
                            ['label' => 'Look Up Table', 'icon' => 'table', 'url' => ['/look-up']],
                        ],],
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
