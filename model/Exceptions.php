<?php

class UsernameMissing extends Exception {}
class InvalidChars extends Exception {}
class PasswordMissing extends Exception {}
class PasswordsDoNotMatch extends Exception {}
class TooShortPassword extends Exception {}
class TooShortUsername extends Exception {}
class TooShortUsernameAndPassword extends Exception {}
class UsernameAlreadyTaken extends Exception {}