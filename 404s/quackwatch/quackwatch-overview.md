# QuackWatch 404s Overview

## Main Documentation
- [Quackwatch 404 Guide](/404s/quackwatch/documentation/quackwatch-404-guide.md)
- [Quackwatch Redirect Fix Video](#redirect-fix-video)
- [Quackwatch Legacy Files](#legacy-files)

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