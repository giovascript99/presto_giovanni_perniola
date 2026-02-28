<?php
return
    [
        // Navbar
        'articles' => 'Articles',
        'categories' => 'Categories',
        'reviewerArea' => 'Reviewer Area',
        'hi' => 'Hi',
        'login' => 'Login',
        'register' => 'Register',
        'search' => 'Search',

        // Categories dropdown
        'hardware_core' => 'Hardware & Core Components',
        'workstations' => 'Workstations & Laptops',
        'drones_robotics' => 'Drones & Robotics',
        'neural_home' => 'Smart Home & IoT',
        'techwear' => 'Techwear & Gear',
        'sonic_gear' => 'Audio & Sonic Gear',
        'simulations' => 'Gaming & Simulations',
        'e_mobility' => 'E-Mobility',

        // User dropdown
        'articleCreate' => 'Create article',
        'logout' => 'Logout',
        'dashboard' => 'User Dashboard',

        // Hero Section title
        'heroSubtitle' => 'Hardware for the next era',

        // Hero Section button
        'createArticle' => 'Post an article',

        // Header
        'recentArticles' => 'Recent articles',
        'noArticles' => 'No articles have been created yet',

        // Card component
        'detail' => 'Detail',

        // Footer revisor request
        'revisorRequestTitle' => 'Do you want to become a reviewer?',
        'revisorRequestSubtitle' => 'By clicking the button below you will send a request to our admin.',
        'revisorButton' => 'Become a reviewer',

        // Article index
        'exploreArticle' => 'Explore our articles',
        'noArticlesIndex' => 'There are no articles in this section yet',
        'articles' => 'Articles',

        // Article byCategory
        'byCategory_h1' => 'Articles in this category: ',
        'noArticleByCategory' => 'No articles have been created for this category yet!',
        'firstInPublish' => 'Do you want to be the first?',

        // Article create
        'title' => 'Title',
        'description' => 'Description',
        'price' => 'Price',
        'selectCategory' => 'Select a category',
        'btnCreate' => 'Create',
        'uploadImages' => 'Upload Images',
        'photoPreview' => 'Photo preview',

        // Article edit
        'editArticle' => 'Edit the article',
        'saveAndSend' => 'Save Changes and Send for Review',

        // Article show
        'backToArticle' => 'Back to articles',

        // Searched
        'searchResult' => 'Search results',
        'articleMatch' => 'No articles match your search',
        'allArticles' => 'Browse all articles',

        // ArticleShow
        'soldBy' => 'Sold by',
        'publishedOn' => 'Published on',

        // Revisor
        'revisorDashboard' => 'Revisor dashboard',
        'image' => 'Image',
        'noImage' => 'The user has not uploaded any images for this article.',
        'author' => 'Author',
        'accept' => 'Accept',
        'refuse' => 'Refuse',
        'greatJob' => 'Great job!',
        'noReview' => 'There are no new articles to review at this time.',
        'backToHome' => 'Return to the homepage',

        // User dashboard
        'myDashboard' => 'My dashboard',
        'newArticle' => 'New article',
        'totalArticles' => 'Total Articles',
        'published' => 'Published',
        'underReview' => 'Under Review',
        'category' => 'Category',
        'status' => 'Status',
        'date' => 'Date',
        'actions' => 'Actions',
        'publishedSingular' => 'Published',
        'rejected' => 'Rejected',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'confirmDelete' => 'Are you sure you want to delete this article?',
        'createArticleFirst' => 'CREATE_FIRST_RECORD',


        // Login
        'signIn' => 'Sign In',
        'emailAddress' => 'E-mail address',
        'password' => 'Password',
        'notRegistered' => 'Not registered yet?',
        'signUp' => 'Sign Up',

        // Sign up
        'name' => 'Name',
        'confirmPassword' => 'Confirm password',
        'alreadyRegistered' => 'Hai già un account?',

        // Mail
        'revisorRequestTitle' => 'A user has requested to work with us',
        'userData' => 'User details',
        'name' => 'Name',
        'revisorActionText' => 'If you want to make them a reviewer, click below:',
        'makeRevisorBtn' => 'Make Reviewer',
        // BecomeRevisor
        'revisorMailSubject' => "Make user :name a reviewer",

        // Messages
        // Errors
        'titleRequired' => 'Title is required.',
        'titleMin' => 'Title is too short.',
        'descriptionRequired' => 'Description is required.',
        'descriptionMin' => 'Description is too short.',
        'priceRequired' => 'Price is required.',
        'priceNumeric' => 'Price must be a number.',
        'categoryRequired' => 'Category is required.',
        'errorImage' => 'The file must be an image.',
        'errorMax2mb' => 'Each image must be max 2MB.',
        'errorMax6Images' => 'You can upload a maximum of 6 images.',
        // Article create
        'articleCreated' => 'Article created successfully!',
        // Article edit
        'articleUpdated' => 'Article updated successfully. It is under review again.',
        // ArticleController
        'unauthorized' => 'You are not authorized to perform this action.',
        'articleDeleted' => 'Article permanently deleted.',
        // Revisor dashboard
        'acceptedMessage' => "You have accepted the article :title",
        'rejectedMessage' => "You have rejected the article :title",
        'becomeRevisorRequest' => 'Congratulations, you have requested to become a reviewer',
        // Middleware isRevisor
        'revisorOnly' => 'Area reserved for reviewers only',
    ];
