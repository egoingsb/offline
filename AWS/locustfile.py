from locust import HttpUser, task

class HelloWorldUser(HttpUser):
    @task
    def test(self):
        self.client.get("/loadtest.php")
