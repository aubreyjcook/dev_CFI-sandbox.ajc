# QuackWatch 404s Overview

## Main Documentation
- [Quackwatch 404 Guide](/404s/quackwatch/documentation/quackwatch-404-guide.md)
- [Quackwatch Redirect Fix Video](#redirect-fix-video)
- [Quackwatch Legacy Files](#legacy-files)

### 404s Data

- [Original Crawled 404s Data (Fixed 404s are removed as completed)](#original-quackwatch-404s-data) <> <!-- TODO: Add link -->
- [Finished 404s](#completed-404s) <> <!-- TODO: Add link -->
- [Quackwatch 404s Copy with Notes](#redirect-404s-copy-with-notes) <!-- TODO: Add link -->

## Regex
- [Regex Overview](/quackwatch/regex/regex-overview.md)

## Redirects

- [Redirects Overview](/quackwatch/redirects/redirects-overview.md)

### Redirect LLM Review Template:

    ```
    I have a 404 that comes from: [SOURCE URL] it needs to point to [DESTINATION URL]
    For context: [CONTEXT]
    Please review and create an example redirect for this 404. Use Regex if necessary.
    ```

## 404s

- [404s Overview](/quackwatch/404s/404s-overview.md)

## Redirect Fix Video

## Legacy Files

### Note on Legacy Files

Within the quackwatch directory are legacy files that are no longer in use. This is under an ignored directory by git due to the size and deprecated nature of the files. The directory is normally located at `quackwatch/legacy-files/`. If you need access to these files, please contact the repository owner.

## 404s Data

### Original Quackwatch 404s Data

This is the original data from the Quackwatch 404s crawl. This data is used to track the progress of fixing 404s on the Quackwatch site. The data is stored in a google docs sheet. The data is updated as 404s are fixed. Rows represent individual 404s and are cut from the table as they are corrected. They are moved to the [Finished 404s](#completed-404s) section.

The data sheet is an internal CFI document and must be requested from a CFI Web department member, thus the link is not provided here.

### Completed 404s

This is the list of 404s that have been fixed on the Quackwatch site. This list is updated as 404s are fixed. The data is stored in a google docs sheet. Rows represent individual 404s and are appended from the [Original Quackwatch 404s Data](#original-quackwatch-404s-data) section.

The data sheet is an internal CFI document and must be requested from a CFI Web department member, thus the link is not provided here.

### Quackwatch 404s Copy with Notes

This is a copy of the Quackwatch 404s data made when revisiting the data in 07/2024. This is intended to relationally hold only the 404 urls, along with a list of notes as the 404 is investigated and a list of redirects including the regex that is supplied as a solution to the 404. The completed 404 is highlighted in yellow if it is sucessfully fixed, and red if there is no viable solution.

The data sheet is an internal CFI document and must be requested from a CFI Web department member, thus the link is not provided here.