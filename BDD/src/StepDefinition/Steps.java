package StepDefinition;		

import org.openqa.selenium.By;		
import org.openqa.selenium.WebDriver;		
import org.openqa.selenium.chrome.ChromeDriver;

import cucumber.api.java.en.Given;		
import cucumber.api.java.en.Then;

public class Steps {
	
	WebDriver driver;
	
	@Given("^Open the chrome and launch the application$")
	public void open_the_chrome_and_launch_the_application() throws Throwable {
		System.setProperty("webdriver.chrome.driver", "C:\\BDDSite\\chromedriver_win32\\chromedriver.exe");					
	       driver= new ChromeDriver();					
	       driver.manage().window().maximize();			
	       driver.get("http://newbdd/");	
	}

	@Then("^The page is visible$")
	public void the_page_is_visible() throws Throwable {
		  System.out.println("the page is visible");
	}


}
