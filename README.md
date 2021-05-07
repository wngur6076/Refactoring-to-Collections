# Refactoring to Collections: The Exercises!

The exercises for the book are broken down into three categories:

1. Beginniner

    These exercises focus on fundamentals. You'll get to practice reimplementing cornerstone collection operations like `map`, `filter`, and `reduce`, and practice using those operations to solve simple problems.

2. Intermediate

    The intermediate exercises focus on learning how to apply multiple operations in sequence to solve a problem. Each one is a little trickier than the last, and you'll need to use operations beyond just `map`, `filter`, and `reduce`.

3. Pro
    
    The pro exercises build on what you practiced in the intermediate exercises, but start to introduce longer pipelines and problems that require more creative solutions.

## How to do the exercises

All of the exercises are organized into PHPUnit test cases. I've bundled any necessary vendor dependencies with the exercises, so you don't need to download anything extra to get started.

To start working on an exercise, open that exercise file and look for a comment block with instructions. Edit the exercise file directly to add your solution.

To run a test you are working on, run PHPUnit from the command line, passing the test file name as an argument.

For example, to run the first test in the `beginner` category, make sure you are in the directory where this README is located and run:

```
./vendor/bin/phpunit beginner/1-ReimplementMapTest.php
```

I've included my solutions to the exercises in a separate folder for you to compare against when you come up with a solution. Don't cheat though, the best way to learn this stuff is to practice! Don't check the solutions unless you've already finished the exercise and want to compare your work with mine, or unless you are really stuck and can't figure out the solution.

Good luck!
– Adam

## 컬렉션 자주 사용하는 모음

* "Tell Don't Ask" style? Certainly”
* 2번째 인자는 대부분 예외 시 디폴트값임.

* flatten: flatten 메소드는 다차원으로 구성된 컬렉션을 한 차원으로 변경
* map: 모든 원소의 변형이 일어나면 사용
* filter:  모든 원소 중에서 조건에서 몇 가지 원소를 가져오려면 사용
* reject: 필터 반대
* pluck: 간단하게 원소들을 가져올 때 map 대신 사용
* get: 원소 중 가져옴, 2번째 인자 예외값이라 사용하기 편함
* contains: 모든 원소 중 원하는 검사가 존재하는지 체크
* last: 마지막 원소 가져옴
* first: 첫 번째 원소 가져옴
* reduce: 원소들의 합계 구할 때 유용, 지도 작업 중에 키를 사용자 지정하려는 문제
* reserve: 원소 반대로 정렬
* values: 원소i값 재배치
* zip: 두 개의 원소를 압축(합친다)
* each: 컬렉션 원소를 foreach 순회
* transpose: [1, 2, 3],[4, 5, 6],[7,8,9] => [1, 4, 7],[2, 5, 8],[3, 6, 9]
* groupBy: 그룹별로 배열에 묶어줌.
* collapse: 10 => [1, 2, 3] 여기서 10을 없애준다.
* sortByDesc: 콜백으로 큰 순서대로 필터할 때 유용
* keys: key => 벨류로 가져옴 
