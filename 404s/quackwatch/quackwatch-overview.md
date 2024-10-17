# QuackWatch 404s Overview

## Main Documentation
- [Quackwatch 404 Guide](/404s/quackwatch/documentation/quackwatch-404-guide.md)
- [Quackwatch Redirect Fix Video](#redirect-fix-video)
- [Quackwatch Legacy Files](#legacy-files)
- [Observations](#observations)

### 404s Data

- [Original Crawled 404s Data (Fixed 404s are removed as completed)](#original-quackwatch-404s-data)
- [Finished 404s](#completed-404s)
- [Quackwatch 404s Copy with Notes](#redirect-404s-copy-with-notes)

### Redirect LLM Review Template:

    I have a 404 that comes from: [SOURCE URL] it needs to point to [DESTINATION URL]
    For context: [CONTEXT]
    Please review and create an example redirect for this 404. Use Regex if necessary. Indicate any noteworthy information. The redirect is handled using the redirection tool for WordPress.

## Redirect Fix Video

A video example of how to fix a 404 on the Quackwatch site.

- [Redirect Fix Video Example (Requires Permissions)](https://drive.google.com/file/d/1wfktM1yaJRyND7S7E8enoQVc-sDENM-1/view?usp=drive_link)

## Legacy Files

### Note on Legacy Files

Within the quackwatch directory are legacy files that are no longer in use. This is under an ignored directory by git due to the size and deprecated nature of the files. The directory is normally located at `quackwatch/legacy-files/`.

- [Legacy Files Google Drive (Requires Permissions)](https://drive.google.com/drive/folders/1WODGzed-Lv-3Lg3m%5C_Ujzp0F-lpE4q-zu?usp=drive%5C_link)

## 404s Data

### Original Quackwatch 404s Data

This is the original data from the Quackwatch 404s crawl. This data is used to track the progress of fixing 404s on the Quackwatch site. The data is stored in a google docs sheet. The data is updated as 404s are fixed. Rows represent individual 404s and are cut from the table as they are corrected. They are moved to the [Finished 404s](#completed-404s) section.

The data sheet is an internal CFI document and requires permissions to access.

- [Original Quackwatch 404s Data](https://docs.google.com/spreadsheets/d/1VPG1GDFP6bXBrsuSP8o0iuZV6ty7sk_3VL_5LNm7pOs/edit?gid=1349576438)

### Completed 404s

This is the list of 404s that have been fixed on the Quackwatch site. This list is updated as 404s are fixed. The data is stored in a google docs sheet. Rows represent individual 404s and are appended from the [Original Quackwatch 404s Data](#original-quackwatch-404s-data) section.

The data sheet is an internal CFI document and requires permissions to access.

- [Completed 404s](https://docs.google.com/spreadsheets/d/1VPG1GDFP6bXBrsuSP8o0iuZV6ty7sk_3VL_5LNm7pOs/edit?gid=328541841)

### Quackwatch 404s Copy with Notes

This is a copy of the Quackwatch 404s data made when revisiting the data in 07/2024. This is intended to relationally hold only the 404 urls, along with a list of notes as the 404 is investigated and a list of redirects including the regex that is supplied as a solution to the 404. The completed 404 is highlighted in yellow if it is sucessfully fixed, and red if there is no viable solution.

The data sheet is an internal CFI document and requires permissions to access.

- [Quackwatch 404s Copy with Notes](https://docs.google.com/spreadsheets/d/1VPG1GDFP6bXBrsuSP8o0iuZV6ty7sk_3VL_5LNm7pOs/edit?gid=1794044567)

### Legacy Directory Hierarchy

The legacy directory structure is observed in the following data:
`
/.well-known
/00AboutQuackwatch
/01QuackeryRelatedTopics
/02ConsumerProtection
/03HealthPromotion
/04ConsumerEducation
/05Links
/06ResearchProjects
/07PoliticalActivities
/08Misc
/09Advisors
/10Bio
/11Ind
/12Web
/13Hx
/14Legal
/15Ads
/believe
/cgi
/cgi-bin
/css
/Gifs
/GT
/h
/iom
/lists
/moving.page
/n
/nf
/old
/s
/search
/suspended.page
/t
/v
/.well-known/acme-challenge
/.well-known/pki-validation
/00AboutQuackwatch/Awards
/01QuackeryRelatedTopics/Cancer
/01QuackeryRelatedTopics/chiroletters
/01QuackeryRelatedTopics/dictionary
/01QuackeryRelatedTopics/DSH
/01QuackeryRelatedTopics/ems
/01QuackeryRelatedTopics/Gifs
/01QuackeryRelatedTopics/Hair
/01QuackeryRelatedTopics/HBOT
/01QuackeryRelatedTopics/Hearing
/01QuackeryRelatedTopics/hearing_2010
/01QuackeryRelatedTopics/homeopetition
/01QuackeryRelatedTopics/lyme
/01QuackeryRelatedTopics/Naturopathy
/01QuackeryRelatedTopics/Nonvictims
/01QuackeryRelatedTopics/OTA
/01QuackeryRelatedTopics/PhonyAds
/01QuackeryRelatedTopics/Tests
/01QuackeryRelatedTopics/Victims
/01QuackeryRelatedTopics/Cancer/clark
/01QuackeryRelatedTopics/Cancer/clarkaff
/01QuackeryRelatedTopics/Cancer/Gifs
/01QuackeryRelatedTopics/Cancer/iat
/01QuackeryRelatedTopics/Cancer/manner
/01QuackeryRelatedTopics/Naturopathy/NANP
/01QuackeryRelatedTopics/PhonyAds/Gifs
/01QuackeryRelatedTopics/PhonyAds/slim
/01QuackeryRelatedTopics/PhonyAds/znatural
/01QuackeryRelatedTopics/PhonyAds/znatural/bankruptcy
/01QuackeryRelatedTopics/Tests/alcat
/01QuackeryRelatedTopics/Tests/bdort
/01QuackeryRelatedTopics/Tests/cyto
/01QuackeryRelatedTopics/Tests/genetic
/01QuackeryRelatedTopics/Tests/Gifs
/01QuackeryRelatedTopics/Tests/thyroflex
/01QuackeryRelatedTopics/Tests/alcat/patents
/02ConsumerProtection/AG
/02ConsumerProtection/asyra
/02ConsumerProtection/FDAActions
/02ConsumerProtection/FTCActions
/02ConsumerProtection/mccaskill
/02ConsumerProtection/USPSActions
/02ConsumerProtection/AG/AR
/02ConsumerProtection/AG/AZ
/02ConsumerProtection/AG/CA
/02ConsumerProtection/AG/ME
/02ConsumerProtection/AG/MO
/02ConsumerProtection/AG/OR
/02ConsumerProtection/AG/PA
/02ConsumerProtection/AG/TX
/02ConsumerProtection/AG/WA
/02ConsumerProtection/FDAActions/mms
/02ConsumerProtection/FDAActions/regenexx
/03HealthPromotion/fibromyalgia
/03HealthPromotion/fibromylagia
/03HealthPromotion/Gifs
/03HealthPromotion/immu
/03HealthPromotion/immu/pertissis_outbreak_files
/03HealthPromotion/immu/schiff
/04ConsumerEducation/BookContents
/04ConsumerEducation/Gifs
/04ConsumerEducation/NegativeBR
/04ConsumerEducation/News
/04ConsumerEducation/Nonrecorg
/04ConsumerEducation/null
/04ConsumerEducation/QA
/04ConsumerEducation/Reviews
/04ConsumerEducation/Websites
/04ConsumerEducation/Nonrecorg/abcmt
/04ConsumerEducation/Nonrecorg/bernadean
/04ConsumerEducation/Nonrecorg/dan
/04ConsumerEducation/Nonrecorg/groton
/04ConsumerEducation/Nonrecorg/healthyfoundations
/04ConsumerEducation/QA/osteo
/06ResearchProjects/als
/06ResearchProjects/saam
/07PoliticalActivities/MACCAH
/07PoliticalActivities/WHC
/07PoliticalActivities/WHC/wp
/08Misc/dfh
/08Misc/nasm
/08Misc/zamboni
/08Misc/dfh/tech
/11Ind/bradstreet
/11Ind/braverman
/11Ind/Dardik
/11Ind/Day
/11Ind/farrah
/11Ind/Gifs
/11Ind/hinz
/11Ind/hooper
/11Ind/IOM
/11Ind/kaptchuk
/11Ind/Krop
/11Ind/lee
/11Ind/lundell
/11Ind/panahpour
/11Ind/Peskin
/11Ind/Pinkus
/11Ind/rubio
/11Ind/sebi
/11Ind/stowe
/11Ind/von_kiel
/11Ind/Watson
/11Ind/young_documents
/11Ind/farrah/fda
/13Hx/dr_rinse
/13Hx/MM
/13Hx/probe
/13Hx/TM
/13Hx/probe/01
/13Hx/probe/02
/13Hx/probe/03
/13Hx/probe/04
/13Hx/probe/05
/13Hx/probe/06
/13Hx/probe/07
/13Hx/probe/08
/14Legal/klatz
/15Ads/bbb
/15Ads/dz10
/15Ads/images
/css/images
/css/include
/Gifs/schiff
/lists/.well-known
/lists/cgi-bin
/lists/.well-known/acme-challenge
/lists/.well-known/pki-validation
/s/admin
/s/css
/s/p
/s/www.holisticdentistillinois.com
/s/css/images
/s/p/admin
`

Many errors are resolved by redefining the url to reflect the new hierarchy, here are some examples:

Note: Each url normally begins with 'https://www.quackwatch.org/' within the live site.

**Example 1:**

/related/tt/ttresponse/ -> /related/ttresponse/

Explanation: 

The referall url occurs at https://quackwatch.org/related/tt/ and when an anchor tag defined as `<A HREF="ttresponse.html">` is clicked, the route changes with the relative path to /related/tt/ttresponse/. However, the file is located at /related/ttresponse/ on the live site. The earlier segment is removed and the final segment is kept.

**Example 2:**

/related/theratec/Cancer/davidsonindictment/ -> /related/cancer/davidson/

Explanation:

There is a similar mismatch with the referall url as above, but the route is corrected by removal of the earlier segment and following the route that matches the live site hierarchical structure. Note that the first segment is removed but the two that follow are kept.

**Example 3:**

/related/tests/clia/bioter/ -> /related/tests/bioter/

Explanation:

The referall url occurs at https://quackwatch.org/related/tests/ where a legacy anchor tag is accessed. This occurs because the entire url is defined in the anchor tag, but it follows the a legacy pattern. Because of this, the segment between the first and final segment is actually removed.

/related/tests/bodybalance/healthcheck/ -> /related/tests/healthcheck/

**Example 4:**

Explanation:

This 404 is basically the same case as the last, but it's notable for existing under the same directory, showing that the pattern can follow from the same directory on a page where the same legacy anchor tag pattern is used.




### Observations