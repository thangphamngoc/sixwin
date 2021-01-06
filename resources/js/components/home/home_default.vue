<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div>
							<h3 class="card-title">
							DANH SÁCH TASK
							</h3>
							<p class="success_blue" v-if="check!=0">{{thongbao}}</p>
							<p class="success_red" v-if="check==0">{{thongbao}}</p>
						</div>
						<div class="card-tools">
							<a href="#" class="btn btn-primary" @click="newTask()"><i class="fa fa-plus-circle"></i>Thêm </a>
						</div>
					</div>
					<div class="card-body table-responsive">
						<table class="table table-hover table-bordered">
							<thead>
		    					<tr>
		    						<td>ID</td>
		    						<td>Tên</td>
		    						<td>Nội Dung</td>
		    						<td>File Âm Thanh</td>
		    						<td>Trạng Thái</td>
		    						<td>Modify</td>
		    					</tr>
		    				</thead>
		    				<tbody>
		    					<tr v-for="item in listTask.data" :key="item.id">
		    						<td>{{item.id}}</td>
		    						<td >
		    							<!-- @click="detailTask(item)" -->
		    							<router-link  :to="{ name: getUri(item.id),query : { id: item.id}}">
		    							{{item.name}}
		    							</router-link>
		    						</td>
		    						<td>{{item.content}}</td>
		    						<td>{{item.link_sound}}</td>
		    						<td>
										<span v-if="status==0">Chưa xử lý</span>
										<span v-if="status==1">Đang xử lý</span>
										<span v-if="status==2">Đã xử lý xong</span>
										<span v-if="status==3">Bị Lỗi</span>
		    						</td>
		    						<td><a href="#" @click="editTask(item)" ><i class="fa fa-edit blue"></i></a>
                                    /
                                    <a href="#" @click="showDL(item)"><i class="fa fa-trash red"></i></a></td>
		    					</tr>
		    				</tbody>
						</table>
					</div>
					<div class="card-footer">
						<pagination :data="listTask" @pagination-change-page="getResults">
							<span slot="prev-nav">&lt; Previous</span>
    						<span slot="next-nav">Next &gt;</span>
						</pagination>
						<!-- <pagination :data="listTask" @pagination-change-page="loadTask"></pagination> -->
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
		<div class="modal fade" id="taskModal" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!edittask">Thêm Task</h5>
                        <h5 class="modal-title" v-show="edittask">Sửa Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="edittask ? updateTask() : createTask()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên task</label>
                                <input v-model="form.name" type="text" name="name" placeholder="Nhập Tên Task" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <input v-model="form.content" type="text" name="content" placeholder="Nhập nội dung" class="form-control" :class="{ 'is-invalid': form.errors.has('content') }">
                                <has-error :form="form" field="content"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Link âm thanh</label>
                                <input v-model="form.link_sound" type="text" name="link_sound" placeholder="Nhập link âm thanh" class="form-control" :class="{ 'is-invalid': form.errors.has('link_sound') }">
                                <has-error :form="form" field="link_sound"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="edittask" type="submit" class="btn btn-success">Update</button>
                            <button id="addContact" v-show="!edittask" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end modal crete task-->
        <div class="modal fade" id="deleteModal" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bạn có muốn xóa task hay không?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body text-center">
                        	<button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                            <button type="button" class="btn btn-success" @click="deleteTask(item)">YES</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
        <!--end model show delete-->
	</div>
</template>
<style type="text/css" lang="scss">
	.success_blue{
		font-weight: bold;
	    color: #0cbb35;
	}
	.success_red{
		font-weight: bold;
	    color: #f44545;
	}
</style>

<script>
import HomeService from "@/services/HomeService";

export default {
    data() {
        return {
        	edittask: false,
        	listTask:{},
        	task:{},
        	id:0,
        	name:'',
        	content:'',
        	link_sound:'',
        	status:0,
        	thongbao:'',
        	check:'',
        	 form: new Form({
        	 	id:'',
                name:'',
	        	content:'',
	        	link_sound:'',
                    }),
        }
    },
    mounted() {
         this.getResults();
    },
    methods: {
    	getUri(name){
                return 'detail-task';
        },
    	getResults(page = 1) {

            HomeService.searchTask(page)
                .then(response => {
                    this.listTask = response.data;
                });
        },
    	newTask() {
            this.edittask = false;
            this.form.reset();
            $('#taskModal').modal('show');
        },
        createTask() {
            // HomeService.createTask(this.form)
            this.form.post('/api/loadtasks')
                .then(() => {
                    $('#taskModal').modal('hide');
                	this.check=1;
                    this.thongbao = "Bạn đã thêm thành công task";
                    this.getResults();
                })
                .catch(() => {
                	this.check=0;
                	this.thongbao = "Thêm task lỗi";
                });
        },
    	editTask(item) {
    		// console.log(item);
            this.edittask = true;
            this.form.reset();
            $('#taskModal').modal('show');
            console.log(item);
            this.form.fill(item);
        },
        updateTask() {
            this.form.put('api/loadtasks/' + this.form.id)
                .then(() => {
                    // success
                    $('#taskModal').modal('hide');
                	this.check=1;
                    this.thongbao = "Bạn đã update thành công task";
                    this.getResults();
                })
                .catch(() => {
                	this.check=0;
                    this.thongbao = "Update task lỗi";
                    // this.$Progress.fail();
                });
        },
        detailTask(item){
        	axios.get('api/loadtasks/' + item.id)
                .then(() => {
                });
        },
        showDL(item){
            $('#deleteModal').modal('show');
            this.task = item;
        },
        deleteTask(){
            this.form.delete('api/loadtasks/' + this.task.id).then(() => {
	            // success
	            $('#deleteModal').modal('hide');
	        	this.check=1;
	            this.thongbao = "Bạn đã xóa thành công task";
             this.getResults();
            }).catch(() => {
                this.check=0;
                this.thongbao = "Xóa task lỗi";
            });
        },
    },

    created() {
        // this.loadTask();

        // axios.get('/api/getAllUsers').then(({ data }) => (this.users = data));
    },
}
</script>


