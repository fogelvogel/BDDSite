#Author: your.email@your.domain.com
#Keywords Summary :
#Feature: List of scenarios.
#Scenario: Business rule through list of steps with arguments.
#Given: Some precondition step
#When: Some key actions
#Then: To observe outcomes or validation
#And,But: To enumerate more Given,When,Then steps
#Scenario Outline: List of steps for data-driven as an Examples and <placeholder>
#Examples: Container for s table
#Background: List of steps run before each of the scenarios
#""" (Doc Strings)
#| (Data Tables)
#@ (Tags/Labels):To group Scenarios
#<> (placeholder)
#""
## (Comments)
#Sample Feature Definition Template
@tag
Feature: Checking CRUD


  Scenario: Add new cat to the base
    Given i opened browser window
  	When i clicked new button
  	And i typed "murzik" in imya field
  	And i typed "sfinks" in poroda field
  	And i typed "rozovi" in cvet field
  	And i typed "boevoi" in harakter field
  	And i clicked save button
  	Then new cat should be visible
  	When i clicked show button
  	And clicked delete button
  	Then new cat should not be visible
  	
  	@current
  	Scenario: Add new cat and check fields
  	Given i opened browser window
  	When i clicked new button
  	And i typed "murzik" in imya field
  	And i typed "sfinks" in poroda field
  	And i typed "rozovi" in cvet field
  	And i typed "boevoi" in harakter field
  	And i clicked save button
  	Then new cat should be visible
  	Then first cell should be "murzik"
  	Then second cell should be "sfinks"
  	Then third cell should be "rozovi"
  	Then fourth cell should be "boevoi"
  	When i clicked show button
  	And clicked delete button
  	Then new cat should not be visible
