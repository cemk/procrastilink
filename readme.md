# ProcrastiLink

ProcrastiLink is a read it later tool based on Kirby CMS. It allows one to send URLs from their phone and then view them on their computers. 

### To-Do List
- [ ] Implement a failsafe for failure to generate safe words from https://nouns.cemkesemen.com/api
- [x] ~~Refactor save code so there are no nested if/else statements.~~
- [x] Let the Workflow workflow (*sigh*) know when it is not talking to ProcrastiLink. 
- [ ] Refactor Workflow workflow (*sigh*) to decrease waiting time.

## Installation

### 1. Installing the web app

ProcrastiLink does not require a database, which makes it very easy to
install. Just copy [ProcrastiLink's files](https://github.com/cemk/procrastilink/archive/master.zip) to your server and visit the
URL for your website in the browser.

*Please check if the invisible .htaccess file has been
copied to your server correctly.*

#### With Git

You can alternatively clone ProcrastiLink repository from Github.

    git clone https://github.com/cemk/procrastilink.git

### 2. Posting link to the app
For now, you need the [Workflow](http://workflow.is) app to post the URLs to the app. You can then [install this workflow](https://workflow.is/workflows/918e6365d1d34c7abd7b4beca5951e3a) and get started.

**NEW!** Now ProcrastiLink shows a notification for successful requests, and errors for unsuccessful ones. Like real apps should.

# About Kirby

Kirby is a file-based CMS.
Easy to setup. Easy to use. Flexible as hell.

## Trial

You can try Kirby on your local machine or on a test
server as long as you need to make sure it is the right
tool for your next project.

## Buy a license

You can purchase your Kirby license at
<http://getkirby.com/buy>

A Kirby license is valid for a single domain. You can find 
Kirby's license agreement here: <http://getkirby.com/license>


## Copyright

Kirby © 2009-2016 Bastian Allgeier (Bastian Allgeier GmbH)
<http://getkirby.com>