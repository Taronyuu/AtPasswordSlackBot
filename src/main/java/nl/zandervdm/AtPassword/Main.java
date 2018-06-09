package nl.zandervdm.AtPassword;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.web.client.RestTemplate;

@SpringBootApplication(scanBasePackages = {"me.ramswaroop.jbot", "example.jbot"})
public class Main {
	
	@Bean
    public RestTemplate restTemplate() {
        return new RestTemplate();
    } 

    public static void main(String[] args) {
		System.out.println("[AtPassword] Starting application");

		SpringApplication.run(Main.class, args);
    }

}
