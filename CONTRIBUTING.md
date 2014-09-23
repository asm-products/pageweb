Contributing
===================

Working on a section or module or Got a new feature to add to pageweb.

Use the git workflow defined below.

1. Checkout to <master> branch

    $ git checkout master

2. Create a new branch from <master> branch and give it a reasonable name

    $ git checkout -b <branch-name>

At this point, you are on <branch-name>

3. Add this branch to remote so others developers can see updates on this feature you are working on.

    $ git push --set-upstream origin <branch-name>

4. After reasonable addition to code, commit changes and push to remote branch

    $ git push origin <branch-name>

5. When you are done with the feature or addition, merge this with the <master> branch squashing all commits also.

    $ git checkout master

you are now in <master> branch

    $ git merge --squash <branch-name>

6. Now, commit all changes from that branch.

    $ git commit -m "Adding my cool feature"

7. Push to origin

    $ git push origin master

### Things to note

When you are working on the other branch, you should periodically checkout to <master> branch and do a git pull

to update your master branch cos there are chances that some other Great developers like Laju Morrison :) might

have pushed some commits. After pulling changes, $ git checkout to your <branch-name> and merge <master> branch.

This is so your <branch-name> is always updated to the latest code while you are still working on that cool feature.

below is the sample command. Lets say you are currently on <branch-name>

    $ git checkout master
    $ git pull origin master
    $ git checkout <branch-name>
    $ git merge master

Thanks to all working on PageWeb application...

Big credits goes to the founders

* [Stanley Odajovwa](http://stanwarri.com)
* [Laju Morrison](http://morrelinko.com)
* [Kola Tiamiyu](http://facebook.com/)