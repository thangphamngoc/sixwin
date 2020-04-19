<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div>
							<h3 class="card-title">
							CHI TIẾT TASK
							</h3>
						</div>
					</div>
					<div class="card-body table-responsive">
                        <div class="title_task col-12 text-center">
                            <h3>Task: {{details.name}}</h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <h3>Nội dung</h3>
                                <div>
                                    <p>{{details.content}}</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <h3>Âm thanh</h3>
                                <div>
                                    audio
                                    <span v-if="details.status==0">Chưa xử lý</span>
                                    <span v-if="details.status==1">Đang xử lý</span>
                                    <span v-if="details.status==3">Bị Lỗi</span>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="card-footer">
                        <div>
                            <router-link  :to="{ name: getUri()}">
                                <i class="fa fa-arrow-left"></i>
                                <span>Quay lại</span>
                            </router-link>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
    data() {
        return {
        	details:{},
        }
    },
    mounted() {
         // this.getResults();
    },
    methods: {
    getUri(name){
            return 'text-to-speech';
    },
	loadTask() {
                axios.get('api/loadtasks/'+ this.$route.query.id)
                .then(response => {
                this.details = response.data;
            })
            },
    },

    created() {
        this.loadTask();

        // axios.get('/api/getAllUsers').then(({ data }) => (this.users = data));
    },
}
</script>


