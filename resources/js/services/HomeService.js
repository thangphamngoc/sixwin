import http from "../http-common";

class HomeService {
    // searchAdmin(status, activated, nameOrPhone) {
    //     return http.get(`/admin/employee?status=${status}&activated=${activated}&nameOrPhone=${nameOrPhone}`);
    // }
    searchTask(data) {
        return http.get(`/api/loadtasks?page=${data}`);
    }
    createTask(data) {
        return http.post('/api/loadtasks', data);
    }
    // updateAdmin(data) {
    //     return http.put("/admin/employee", data);
    // }
    // deleteAdmin(id) {
    //     return http.delete(`/admin/employee/${id}`);
    // }
    // getAllAdminAccount() {
    //     return http.get("/admin/employee/account");
    // }
    // updateActiveAccount(data) {
    //     return http.put("/admin/employee/account/active", data);
    // }
    // searchAdminSchool(nameOrPhone) {
    //     return http.get(`/admin/employee-school?nameOrPhone=${nameOrPhone}`);
    // }
    // findAdminOfSchool(id) {
    //     return http.get(`/admin/employee-school/${id}`);
    // }
    // updateAdminOfSchool(id, data) {
    //     return http.put(`/admin/employee-school/${id}`, data);
    // }

}

export default new HomeService();