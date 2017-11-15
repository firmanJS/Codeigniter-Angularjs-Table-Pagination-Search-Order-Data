<div class="container-fluid" ng-controller="UjianCtrl">
  <div class="row row-offcanvas row-offcanvas-left">
    <div class="row-offcanvas row-offcanvas-right">
      <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebarLeft" role="navigation">
        <div class="well sidebar-nav atas20">
          <ul class="nav">
            <li>Menu</li>
              <li><a href="home">Home</a></li>
            <li><a href="data">Data</a></li>
            <li><a href="login/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-10 col-xs-10 atas20">
      <?php if ($this->session->userdata('status')=='Customer'): ?>
      <a href="data/add" class="btn btn-xs btn-info">Add</a>
      <a href="data/send_data" class="btn btn-xs btn-default">Send Data</a>
        <?php endif; ?>
      <?php if ($this->session->userdata('status')=='Pemeriksa1'): ?>
        <a href="data/send_data" class="btn btn-xs btn-default">Approve All Data</a>
      <?php endif; ?>
      <?php if ($this->session->userdata('status')=='Pemeriksa2'): ?>
        <a href="data/send_data" class="btn btn-xs btn-default">Approve All Data</a>
        <a href="data/reject" class="btn btn-xs btn-danger">Reject All Data</a>
      <?php endif; ?>
      <br><br>
      <table class="table table-bordered" ng-init="data_json()">
        <thead>
          <div class="col-md-2" style="margin-bottom: 10px;margin-left: -15px;">Filter Data :
              <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
              </select>
            </div>
            <div class="col-md-4">Cari :
                <input type="text" ng-model="search" ng-change="filter()"
                placeholder="Cari Data" class="form-control" />
            </div>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="res in filtered =
            (pagedItems | filter:search) |
            startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit track by res.id">
            <td>{{$index+1}}</td>
            <td>{{res.name}}</td>
            <td>{{res.city}}</td>
            <td>{{res.country}}</td>
            <td>
              <a href="data/add/{{res.id}}" class="btn btn-xs btn-warning">Edit</a>
              <a href="data/delete_data/{{res.id}}" onclick="return confirm('Are you sure delete this data ?')" class="btn btn-xs btn-danger">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="col-md-12" ng-if="filtered == 0">
        <div class="col-md-12">
          <h4 style="text-align:center;">Data Tidak Ditemukan</h4>
        </div>
      </div>
      <div class="col-md-12">
        <h5 style="text-align:center;">
          Jumlah Data {{totalItems}}</h5>
        </div>
        <div style="text-align:center;" class="col-md-12" ng-show="filteredItems > 0">
          <div pagination="" page="currentPage" on-select-page="setPage(page)"
          boundary-links="true" total-items="filteredItems"  data-max-size="maxSize"
          items-per-page="entryLimit" class="pagination-small"
          previous-text="&laquo;" next-text="&raquo;">
        </div>
      </div>
    </div>
  </div>
  <hr>
  <footer>
    <p class="tengah">© Firman 2017</p>
  </footer>
</div>
