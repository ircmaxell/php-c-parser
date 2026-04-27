static int counter;
int getValue();
static void initCounter() {
  counter = 0;
}
int main() {
  initCounter();
  return 0;
}
