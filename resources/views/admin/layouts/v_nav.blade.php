<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="{{ request()->is('admin')? 'active':'' }}"><a href="/admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  <li class="{{ request()->is('admin/kategori')? 'active':'' }}"><a href="/admin/kategori"><i class="fa fa-fw fa-tags"></i> <span>Kategori</span></a></li>
  <li class="{{ request()->is('admin/artikel')? 'active':'' }}"><a href="/admin/artikel"><i class="fa fa-fw fa-book"></i> <span>Artikel</span></a></li>
</ul>