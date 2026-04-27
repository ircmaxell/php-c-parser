--TEST--
Linked list node struct with typedef and pointer arithmetic
--FILE--
typedef struct Node {
  int data;
  struct Node *next;
} Node;
Node *createNode(int value) {
  Node *node;
  node = (Node *)(0);
  if (node) {
    node->data = value;
    node->next = (Node *)(0);
  }
  return node;
}
int sumList(Node *head) {
  int total;
  total = 0;
  Node *current;
  current = head;
  while (current) {
    total = total + current->data;
    current = current->next;
  }
  return total;
}
--EXPECT--
typedef struct Node {
  int data;
  struct Node *next;
} Node;
Node *createNode(int value) {
  Node *node;
  (node = ((Node *)0));
  if (node) {
    ((node->data) = value);
    ((node->next) = ((Node *)0));
  }

  return node;
}

int sumList(Node *head) {
  int total;
  (total = 0);
  Node *current;
  (current = head);
  while (current) {
    (total = (total + (current->data)));
    (current = (current->next));
  }

  return total;
}
