package StepDefinition;

import org.junit.Assert;
import org.openqa.selenium.By;		
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

import cucumber.api.java.en.Given;	
import cucumber.api.java.en.When;	
import cucumber.api.java.en.Then;

public class CatCreation {
	
	WebDriver driver;
	WebElement[] columns = new WebElement[5];
	
	@Given("^i opened browser window$")
	public void i_opened_browser_window() throws Throwable {
		System.setProperty("webdriver.chrome.driver", "C:\\BDDSite\\chromedriver_win32\\chromedriver.exe");					
	       driver= new ChromeDriver();					
	       driver.manage().window().maximize();			
	       driver.get("http://newbdd/cat/");	
	  
	}

	@When("^i clicked new button$")
	public void i_clicked_new_button() throws Throwable {
		driver.findElement(By.cssSelector("a")).click();
	   
	}

	@When("^i typed \"(.*?)\" in imya field$")
	public void i_typed_in_imya_field(String arg1) throws Throwable {
		driver.findElement(By.cssSelector("#cat_imya")).sendKeys(arg1);
		
	}

	@When("^i typed \"(.*?)\" in poroda field$")
	public void i_typed_in_poroda_field(String arg1) throws Throwable {
		driver.findElement(By.cssSelector("#cat_poroda")).sendKeys(arg1);
	}

	@When("^i typed \"(.*?)\" in cvet field$")
	public void i_typed_in_cvet_field(String arg1) throws Throwable {
		driver.findElement(By.cssSelector("#cat_cvet")).sendKeys(arg1);
	    
	}

	@When("^i typed \"(.*?)\" in harakter field$")
	public void i_typed_in_harakter_field(String arg1) throws Throwable {
		driver.findElement(By.cssSelector("#cat_harakter")).sendKeys(arg1);
	}

	@When("^i clicked save button$")
	public void i_clicked_save_button() throws Throwable {
		driver.findElement(By.cssSelector("button")).click();
	}

	@Then("^new cat should be visible$")
	public void new_cat_should_be_visible() throws Throwable {
		Assert.assertNotNull(driver.findElement(By.cssSelector("td")));
		 
	}
	
	@Then("^first cell should be \"(.*?)\"$")
	public void first_cell_should_be(String arg1) throws Throwable {
	Assert.assertEquals(arg1, driver.findElements(By.cssSelector("td")).get(1).getText());
	
	}

	@Then("^second cell should be \"(.*?)\"$")
	public void second_cell_should_be(String arg1) throws Throwable {
		Assert.assertEquals(arg1, driver.findElements(By.cssSelector("td")).get(2).getText());
	}

	@Then("^third cell should be \"(.*?)\"$")
	public void third_cell_should_be(String arg1) throws Throwable {
		Assert.assertEquals(arg1, driver.findElements(By.cssSelector("td")).get(3).getText());
	}

	@Then("^fourth cell should be \"(.*?)\"$")
	public void fourth_cell_should_be(String arg1) throws Throwable {
		Assert.assertEquals(arg1, driver.findElements(By.cssSelector("td")).get(4).getText());
	}
	
	@When("^i clicked show button$")
	public void i_clicked_show_button() throws Throwable {
		driver.findElement(By.cssSelector("a")).click();
	   
	}

	@When("^clicked delete button$")
	public void clicked_delete_button() throws Throwable {
		driver.findElement(By.cssSelector("button")).click();
		driver.switchTo().alert().accept();
	}

	@Then("^new cat should not be visible$")
	public void new_cat_should_not_be_visible() throws Throwable {
		Assert.assertEquals(1, driver.findElements(By.cssSelector("td")).size());
		 driver.close();
	}

}
