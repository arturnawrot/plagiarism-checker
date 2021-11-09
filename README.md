# Plagiarism Checker

The first Open Source Plagiarism Checker. Depends on the [Bing Web Scraper](https://github.com/arturnawrot/web-scraper) module

9 months after creating the [Bing Web Scraper](https://github.com/arturnawrot/web-scraper) module, the application started to yield less accurate results. Sometimes you will have to submit your plagiarized text multiple times because of unexpected responses from the Bing search. Please, keep in mind that the Bing Scraper module serves only as a free exemplary data provider just for the application testing purposes. 

## Docker Installation

```bash
git clone https://github.com/arturnawrot/plagiarism-checker.git && cd plagiarism-checker
cp .env.example .env
docker-compose up -d
docker-compose exec php make install
```

## Screenshots 
![Results](https://github.com/arturnawrot/plagiarism-checker/blob/master/screenshots/results.png?raw=true "Results")

