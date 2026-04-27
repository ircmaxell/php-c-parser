--TEST--
String utility functions (strlen, strcmp, strcpy)
--FILE--
int myStrlen(const char *s) {
  int len;
  len = 0;
  while (s[len]) {
    len = len + 1;
  }
  return len;
}
int myStrcmp(const char *a, const char *b) {
  int i;
  i = 0;
  while (a[i] && (a[i] == b[i])) {
    if (a[i] == 0) {
      return 0;
    }
    i = i + 1;
  }
  return (a[i] - b[i]);
}
void myStrcpy(char *dest, const char *src) {
  int i;
  i = 0;
  while (src[i]) {
    dest[i] = src[i];
    i = i + 1;
  }
  dest[i] = 0;
}
--EXPECT--
int myStrlen(char *s) {
  int len;
  (len = 0);
  while ((s)[len]) {
    (len = (len + 1));
  }

  return len;
}

int myStrcmp(char *a, char *b) {
  int i;
  (i = 0);
  while (((a)[i] && ((a)[i] == (b)[i]))) {
    if (((a)[i] == 0)) {
      return 0;
    }

    (i = (i + 1));
  }

  return ((a)[i] - (b)[i]);
}

void myStrcpy(char *dest, char *src) {
  int i;
  (i = 0);
  while ((src)[i]) {
    ((dest)[i] = (src)[i]);
    (i = (i + 1));
  }

  ((dest)[i] = 0);
}
