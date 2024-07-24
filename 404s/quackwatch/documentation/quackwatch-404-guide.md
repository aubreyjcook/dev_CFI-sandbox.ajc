The Quackwatch 404s is a result of the original site, created in 1998, having a different folder structure than what was created when the site was moved to Wordpress. Internal links point to locations that were moved and the regex redirects created did not capture every page path. 98% of the pages that existed on the original site were moved over, so the page with the 404 will almost always exist. The 404 just has to be redirected to the correct, current location.

SETUP  
Open the Quackwatch site map: [https://quackwatch.org/site-map/](https://quackwatch.org/site-map/)

Download the “Old Quackwatch HTML files onto your local disk : https://drive.google.com/drive/folders/1WODGzed-Lv-3Lg3m\_Ujzp0F-lpE4q-zu?usp=drive\_link

EXAMPLE:

[https://quackwatch.org/01QuackryRelatedTopics/DSH/colloidalminerals/](https://quackwatch.org/01QuackryRelatedTopics/DSH/colloidalminerals/)

1. Look in “Old Quackwatch HTML files” for the html page, “colloidalminerals”  
1. Easily found here: [https://drive.google.com/drive/folders/1fIU-Z6BO0lYjuJuA4rlllNTOkjJvmFc2?usp=drive\_link](https://drive.google.com/drive/folders/1fIU-Z6BO0lYjuJuA4rlllNTOkjJvmFc2?usp=drive\_link)  
   1. A simple process of following the folders: [01QuackryRelatedTopics \> dsh \> colloidalminerals](https://quackwatch.org/01QuackryRelatedTopics/DSH/colloidalminerals/)  
1. Find the existing page through the QW sitemap  
1. Compare the titles from the HTML file and the WP page to make sure they match  
1. Add redirect through the redirect plugin

Video recording of this exact process: [https://drive.google.com/file/d/1wfktM1yaJRyND7S7E8enoQVc-sDENM-1/view?usp=drive\_link](https://drive.google.com/file/d/1wfktM1yaJRyND7S7E8enoQVc-sDENM-1/view?usp=drive\_link)

NOTES  
List of folder changes

* 01QuackryRelatedTopics \=/related/  
* 02ConsumerProtection \= /consumer-protection/  
* 03HealthPromotion \= /health-promotion/  
* 04ConsumerEducation \= /consumer-education/  
* 06ResearchProjects \= /research-projects/  
* 07PoliticalActivities \= /political-activities/  
* 08Misc \= /misc/  
* 09Advisors \= /advisors/

Some pages may just need to be set as a child page of a parent, by going into edit the page.